<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MolecularWeightTest extends TestCase
{
    // Molecular weights for Atomic Elements
    const Atom_weights = [
        'H' => 1.01
    ];

    // Here, we define the both regex patterns
    const clean_pattern = '/\[\d?[+-]\]/'; // For remove the charge
    const parenthesis = '/\((\w+\d{0,2})\)(\d{0,2})/';
    const atom_pattern = '/([A-Z]{1}[a-z]?)(\d{0,2})/'; // For split by atom

    /**
     * Computes the molecular weight for a simple string
     */
    public function compute_weigh($string)
    {
        preg_match_all(self::atom_pattern, $string, $matches);

        $atoms = $matches[1];
        $coefficients = $matches[2];

        for ($i=1; $i<=sizeof($matches) ; $i++) { 
            $w = self::Atom_weights[$atoms[$i]];
            
            $val = $coefficients[$i] ? intval($coefficients[$i]) : 1;
            dd($val);
        }
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
        
        // dd($cleaned_string, $parenthesis_molecules, $free_molecules);

        dd($this->compute_weigh($free_molecules[0]));
    }
}
