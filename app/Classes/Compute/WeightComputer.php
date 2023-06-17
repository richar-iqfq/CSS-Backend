<?php

namespace App\Classes\Compute;

/**
 * Computes the molecular weights with get_molecular_weight following the next steps:
 * - Removes the charge [] from the string (clean_string)
 * - Get the molecular weight of the molecules inside parenthesis ()n where n is the
 *   coefficient that multiplies the atoms inside
 * - Get the molecular weight of the free molecules (outside the parenthesis) with
 *   compute_free_weights
 * - Sum both of the last weights 
 */
class WeightComputer
{
    protected $clean_pattern;
    protected $parenthesis;
    protected $atom_pattern;
    
    protected $atomic_weights;

    public function __construct()
    {
        // Regex Expressions
        $this->clean_pattern = '/\[\d?[+-]\]/'; // For remove the charge
        $this->parenthesis = '/\((\w+\d{0,2})\)(\d{0,2})/'; // For extract the in-parenthesis mols
        $this->atom_pattern  = '/([A-Z]{1}[a-z]?)(\d{0,2})/'; // For split by atom

        // Atomic weights array
        $this->atomic_weights = $this->load_mol_weights(); // Loads the atomic weigths
    }

    /**
     * Main function to compute the molecular weight of the incoming molecule
     */
    public function get_molecular_weight($string): float
    {
        // Clean string
        $cleaned_string = $this->clean_string($string);
        
        // Get Molecules inside parenthesis
        preg_match_all($this->parenthesis, $string, $parenthesis_matches);
        $parenthesis_weight = $this->compute_parenthesis_weight($parenthesis_matches);

        // Get Molecules outside parenthesis
        $free_matches = array_filter(preg_split($this->parenthesis, $cleaned_string));
        $free_weight = $this->compute_free_weights($free_matches);

        // Sum the weight components 
        $molecular_weight = $parenthesis_weight + $free_weight;
        
        return $molecular_weight;
    }

    /**
     * Loads the molecular weights from database/data/PeriodicTableJSON
     */
    private function load_mol_weights()
    {
        // Database credits to: https://github.com/Bowserinator/Periodic-Table-JSON.git
        $json_file = database_path('data/PeriodicTableJSON.json'); // Route for file
        $json = file_get_contents($json_file); // Extract the contents

        $data = json_decode($json, true); // Decode the json file
        $weights = []; // Empty array for final weights

        foreach ($data['elements'] as $element) {
            $weights[$element["symbol"]] = $element["atomic_mass"]; // Fill the weights array
        }

        // Include Deuterium
        $weights['D'] = 2.0141;

        return $weights;
    }

    /**
     * Computes the molecular weight for a simple string
     */
    private function compute_weight($string)
    {
        preg_match_all($this->atom_pattern, $string, $matches); // Search the atom coincidences

        $atoms = $matches[1];
        $coefficients = $matches[2];

        $final_weight = 0; // Final weight for the input molecule

        foreach ($atoms as $key => $atom) {
            $w = $this->atomic_weights[$atom];
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
            
            $mol_weight = $this->compute_weight($mol);
            $final_weight += $mol_weight * $coeff;
        }

        return $final_weight;
    }

    /**
     * Computes the molecular weights of the free matches
     */
    private function compute_free_weights($free_matches)
    {
        $final_weight = 0; // Final weight for the imput molecules
        foreach ($free_matches as $mol) {
            $final_weight += $this->compute_weight($mol);
        }

        return $final_weight;
    }

    /**
     * Cleanes incoming string
     */
    private function clean_string($string)
    {
        // Remove blank spaces
        $cleaned_string = str_replace(' ', '', $string);

        // Remove charge
        $cleaned_string = preg_replace($this->clean_pattern, '', $cleaned_string);

        return $cleaned_string;
    }
}