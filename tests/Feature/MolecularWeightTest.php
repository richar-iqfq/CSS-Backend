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
            $coeff = $coefficients[$key] ? intval($coefficients[$key]) : 1;

            $final_weight += $w * $coeff;
        }

        return $final_weight;
    }
    
    /**
     * Computes the weight of the parenthesis matches
     */
    private function compute_parenthesis_weight($parenthesis_matches)
    {
        $parenthesis_mols = $parenthesis_matches[1];
        $parenthesis_coeff = $parenthesis_matches[2];

        $final_weight = 0; // Final weight for the imput molecules
        
        foreach ($parenthesis_mols as $key => $mol) {
            $coeff = $parenthesis_coeff[$key] ? intval($parenthesis_coeff[$key]) : 1;
            
            $mol_weight = $this->compute_weigh($mol);
            $final_weight += $mol_weight * $coeff;
        }

        return $final_weight;
    }

    /**
     * Computes the molecular weights of the free matches
     */
    private function compute_free_matches($free_matches)
    {
        $final_weight = 0; // Final weight for the imput molecules
        foreach ($free_matches as $mol) {
            $final_weight += $this->compute_weigh($mol);
        }

        return $final_weight;
    }

    /**
     * Clean incoming string
     */
    private function clean_string($string)
    {
        $cleaned_string = str_replace(' ', '', $string);
        
        // Cleaning charge
        $cleaned_string = preg_replace(self::clean_pattern, '', $cleaned_string);

        return $cleaned_string;
    }

    /**
     * @test
     */
    public function get_molecular_weight()
    {
        $test_string = 'C9H7O [-]4';
        $cleaned_string = $this->clean_string($test_string);
        
        // Get Molecules inside parenthesis
        preg_match_all(self::parenthesis, $test_string, $parenthesis_matches);
        $parenthesis_weight = $this->compute_parenthesis_weight($parenthesis_matches);

        // Get Molecules outside parenthesis
        $free_matches = array_filter(preg_split(self::parenthesis, $cleaned_string));
        $free_weight = $this->compute_free_matches($free_matches);

        // Sum the weight components 
        $molecular_weight = $parenthesis_weight + $free_weight;

        dd($molecular_weight);
        return $molecular_weight;
    }
}
