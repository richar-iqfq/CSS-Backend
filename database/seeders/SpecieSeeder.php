<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Classes\Compute\WeightComputer;
use App\Classes\Loader\CsvLoader;
use App\Models\Specie;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/especies.csv');
        $data = CsvLoader::load($file);

        $WeightComputer = new WeightComputer();

        foreach ($data as $key => $line) {
            
            if ($line['masa_molar']) {
                $masa_molar = $line['masa_molar'];
                $PM_bool = false;
            } else {
                $masa_molar = $WeightComputer->get_molecular_weight($line['formula']);
                $PM_bool = true;
            }

            Specie::create([
                'id' => $key,
                'name' => $line['nombre'],
                'formula' => $line['formula'],
                'calculatedMolarWeight' => $PM_bool,
                'molarWeight' => round($masa_molar, 3),
                'density' => $line['densidad']=='' ? null : floatval($line['densidad']),
                'meltingPoint' => $line['fusion']=='' ? null : floatval($line['fusion']),
                'boilingPoint' => $line['ebullicion']=='' ? null : floatval($line['ebullicion']),
                'acidType_id' => $line['clase_acido_id'],
                'chargeType_id' => $line['clase_carga_id']
            ]);
        }
    }
}
