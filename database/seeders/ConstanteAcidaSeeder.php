<?php

namespace Database\Seeders;

use App\Models\ConstanteAcida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConstanteAcidaSeeder extends Seeder
{
    /**
     * Buil array from csv file
     */
    private function build_array_from_csv($file)
    {
        // Open file
        $h = fopen($file, 'r');
        $array_data = [];

        while( ($data = fgetcsv($h, 1000, ',')) !== FALSE)
        {
            $array_data[] = $data;
        }

        fclose($h);

        // Asign column names
        $columns = $array_data[0];
        $columns = array_slice($columns, 1);
        unset($array_data[0]); // Remove the column names

        // Build array with congruent keys
        $data = [];
        foreach ($array_data as $values) {
            $tmp = [];
            $id = $values[0];

            foreach (array_slice($values, 1) as $key => $value)
            {
                $tmp[ $columns[$key] ] = $value;
            }

            $data[$id] = $tmp;
        }

        return $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/constantes_acidas.csv');
        $data = $this->build_array_from_csv($file);
        
        foreach ($data as $key => $line) {
            ConstanteAcida::create([
                'especie_id' => $line['especie_id'],
                'valor_reportado' => $line['valor_reportado'],
                'ka1' => $line['ka1']=="" ? null : floatval($line['ka1']),
                'ka2' => $line['ka2']=="" ? null : floatval($line['ka2']),
                'ka3' => $line['ka3']=="" ? null : floatval($line['ka3']),
                'ka4' => $line['ka4']=="" ? null : floatval($line['ka4']),
                'ka5' => $line['ka5']=="" ? null : floatval($line['ka5']),
                'pka1' => $line['pka1']=="" ? null : floatval($line['pka1']),
                'pka2' => $line['pka2']=="" ? null : floatval($line['pka2']),
                'pka3' => $line['pka3']=="" ? null : floatval($line['pka3']),
                'pka4' => $line['pka4']=="" ? null : floatval($line['pka4']),
                'pka5' => $line['pka5']=="" ? null : floatval($line['pka5']),
                'fuerza_ionica' => $line['fuerza_ionica'],
                'nota' => $line['nota'],
                'referencia_id' => $line['referencia_id']
            ]);
        }
    }
}
