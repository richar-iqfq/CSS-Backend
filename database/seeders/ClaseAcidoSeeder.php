<?php

namespace Database\Seeders;

use App\Models\ClaseAcido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseAcidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acid_classes = [
            'Ácido Débil',
            'Ácido Fuerte',
            'Base Débil',
            'Base Fuerte'
        ];
        
        foreach ($acid_classes as $key => $class) {
            ClaseAcido::create([
                'clase' => $class
            ]);
        }

    }
}