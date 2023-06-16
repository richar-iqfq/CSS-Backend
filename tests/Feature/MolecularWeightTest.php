<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MolecularWeightTest extends TestCase
{
    // Here, we define the both regex patterns
    const clean_pattern = '/\[\d?[+-]\]/'; // For remove the charge
    const parenthesis = '/\((\w+\d{0,2})\)(\d{0,2})/'; // For extract the in-parenthesis mols
    const atom_pattern = '/([A-Z]{1}[a-z]?)(\d{0,2})/'; // For split by atom

    /**
     * Loads the molecular weights from database/data/PeriodicTableJSON
     */
    private function load_mol_weights()
    {
        $json_file = database_path('data/PeriodicTableJSON.json'); // Route for file
        $json = file_get_contents($json_file); // Extract the contents

        $data = json_decode($json, true); // Decode the json file
        $weights = []; // Empty array for final weights

        foreach ($data['elements'] as $element) {
            $weights[$element["symbol"]] = $element["atomic_mass"]; // Fill the weights array
        }

        return $weights;
    }

    /**
     * Computes the molecular weight for a simple string
     */
    private function compute_weigh($string)
    {
        preg_match_all(self::atom_pattern, $string, $matches); // Search the atom coincidences

        $atoms = $matches[1];
        $coefficients = $matches[2];
        
        $atomic_weights = $this->load_mol_weights(); // Loads the atomic weigths

        $final_weight = 0; // Final weight for the input molecule

        foreach ($atoms as $key => $atom) {
            $w = $atomic_weights[$atom];
            $coeff = $coefficients[$key] ? $coefficients[$key] : 1;

            $final_weight += $w * $coeff;
        }

        return $final_weight;
    }

    /**
     * @test
     */
    public function get_molecular_weight(): void
    {
        $test_string = 'HO3OC(CHOH)2C4OOH[+]';

        // Cleaning charge
        $cleaned_string = preg_replace(self::clean_pattern, '', $test_string);
        
        // Get Molecules inside parenthesis
        preg_match_all(self::parenthesis, $test_string, $parenthesis_molecules);

        // Get Molecules outside parenthesis
        $free_molecules = array_filter(preg_split(self::parenthesis, $cleaned_string));
        
        foreach ($parenthesis_molecules as $mol) {
            dd($mol);
        }

        $this->compute_weigh($free_molecules[1]);
    }
}
