<?php

namespace Database\Seeders;

use App\Models\Referencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenciasSeeder extends Seeder
{
    /**
     * Load array from json
     */
    private function load_json($file)
    {
        $referencia_json = file_get_contents($file);

        $decoded_json = json_decode($referencia_json, true);
    
        return $decoded_json;
    }

    /**
     * Load array from csv
     */
    function build_array_from_csv($file)
    {
        // print_r($file);
        $h = fopen($file, 'r');
        $array_data = [];

        while( ($data = fgetcsv($h, 1000, ',')) !== FALSE)
        {
            $array_data[] = $data;
        }

        fclose($h);

        $columns = $array_data[0];
        $columns = array_slice($columns, 1);

        unset($array_data[0]);
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
        $file = database_path('data/referencias.csv');
        $data = $this->build_array_from_csv($file);

        foreach ($data as $key => $line) {

            Referencia::create([
                'autor' => $line['autor'],
                'cita' => $line['cita']
            ]);

        }
    }
}
