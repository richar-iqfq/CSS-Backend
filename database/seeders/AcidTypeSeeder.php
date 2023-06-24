<?php

namespace Database\Seeders;

use App\Models\AcidType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcidTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acid_classes = [
            'Ácido débil',
            'Ácido fuerte',
            'Base débil',
            'Base fuerte'
        ];
        
        foreach ($acid_classes as $key => $class) {
            AcidType::create([
                'type' => $class
            ]);
        }

    }
}