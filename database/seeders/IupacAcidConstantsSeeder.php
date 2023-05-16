<?php

namespace Database\Seeders;

use App\Models\IupacAcidConstant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IupacAcidConstantsSeeder extends Seeder
{
    /** 
     * Load array from json 
     */
    private function load_json($file)
    {
        $iupac_json = file_get_contents($file);

        $decoded_json = json_decode($iupac_json, true);

        return $decoded_json;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/iupac_high-confidence_25.json');
        $data = $this->load_json($file);
        
        foreach ($data as $key => $value) {
            IupacAcidConstant::create([
                'entry' => intval($value['entry']),
                'SMILES' => $value['SMILES'],
                'pka_type' => $value['pka_type'],
                'pka_value' => floatval($value['pka_value']),
                'original_iupac_names' => $value['original_IUPAC_names'],
                'original_iupac_nicknames' => $value['original_IUPAC_nicknames'],
                'acidity_labels' => $value['acidity_label'],
                'assessment' => $value['assessment'],
                'reference_id' => $value['ref']
            ]);

            // print_r($key.' '.$value['ref'].' ');
        }
        
    }
}
