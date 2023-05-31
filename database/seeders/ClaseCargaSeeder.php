<?php

namespace Database\Seeders;

use App\Models\ClaseCarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseCargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $charge_classes = [
            'Neutro',
            'Anión',
            'Catión'
        ];
        
        foreach ($charge_classes as $key => $class) {
            ClaseCarga::create([
                'clase' => $class
            ]);
        }
    }
}
