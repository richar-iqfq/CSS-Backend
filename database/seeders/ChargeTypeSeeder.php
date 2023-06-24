<?php

namespace Database\Seeders;

use App\Models\ChargeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChargeTypeSeeder extends Seeder
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
            ChargeType::create([
                'type' => $class
            ]);
        }
    }
}
