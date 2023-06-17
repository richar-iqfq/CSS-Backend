<?php

namespace Database\Seeders;

use App\Models\Referencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Classes\Loader\CsvLoader;

class ReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/referencias.csv');
        $data = CsvLoader::load($file);
        
        foreach ($data as $key => $line) {
            Referencia::create([
                'autor' => $line['autor'],
                'cita' => $line['cita']
            ]);
        }
    }
}
