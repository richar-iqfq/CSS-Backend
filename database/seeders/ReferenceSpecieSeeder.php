<?php

namespace Database\Seeders;

use App\Models\AcidConstant;
use App\Models\Specie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenceSpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $species = Specie::all();
        $constants = AcidConstant::all();

        foreach ($constants as $constant) {
            $specie_id = $constant->specie_id;
            $reference_id = $constant->reference_id;

            $specie = $species->find($specie_id);

            if (!$specie->references()->find($reference_id))
            {
                $specie->references()->attach($reference_id);
            }
        }
    }
}