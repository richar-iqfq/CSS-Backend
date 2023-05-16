<?php

namespace Database\Seeders;

use App\Models\MoleculeData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoleculeDataSeeder extends Seeder
{
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
        $file = database_path('data/data.csv');
        $data = $this->build_array_from_csv($file);

        foreach ($data as $key => $line) {
            MoleculeData::create([
                'id' => $key,
                'NAtoms' => $line['NAtoms'],
                'Homo' => $line['Homo'],
                'Lumo' => $line['Lumo'],
                'ECorr' => $line['CIe'],
                'HF' => $line['HF']
            ]);
        }
    }
}
