<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
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
        $file = database_path('data/especies.csv');
        $data = $this->build_array_from_csv($file);

        foreach ($data as $key => $line) {
            Especie::create([
                'id' => $key,
                'nombre' => $line['nombre'],
                'formula' => $line['formula'],
                'clase_acido_id' => $line['clase_acido_id'],
                'clase_carga_id' => $line['clase_carga_id']
            ]);
        }
    }
}
