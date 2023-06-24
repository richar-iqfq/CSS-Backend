<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Classes\Loader\CsvLoader;
use App\Models\Reference;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/referencias.csv');
        $data = CsvLoader::load($file);
        
        foreach ($data as $key => $line) {
            Reference::create([
                'author' => $line['autor'],
                'citation' => $line['cita']
            ]);
        }
    }
}
