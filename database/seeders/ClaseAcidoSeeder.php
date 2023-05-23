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
            'ácido débil',
            'ácido fuerte',
            'base débil',
            'base fuerte'
        ];
        
        foreach ($acid_classes as $key => $class) {
            ClaseAcido::create([
                'clase' => $class
            ]);
        }

    }
}