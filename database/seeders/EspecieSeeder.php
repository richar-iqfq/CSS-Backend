<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Classes\Compute\WeightComputer;
use App\Classes\Loader\CsvLoader;

class EspecieSeeder extends Seeder
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

            Especie::create([
                'id' => $key,
                'nombre' => $line['nombre'],
                'formula' => $line['formula'],
                'masa_molar_calculada' => $PM_bool,
                'masa_molar' => round($masa_molar, 3),
                'densidad' => $line['densidad']=='' ? null : floatval($line['densidad']),
                'fusion' => $line['fusion']=='' ? null : floatval($line['fusion']),
                'ebullicion' => $line['ebullicion']=='' ? null : floatval($line['ebullicion']),
                'clase_acido_id' => $line['clase_acido_id'],
                'clase_carga_id' => $line['clase_carga_id']
            ]);
        }
    }
}
