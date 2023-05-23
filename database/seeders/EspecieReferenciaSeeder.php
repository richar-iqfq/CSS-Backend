<?php

namespace Database\Seeders;

use App\Models\ConstanteAcida;
use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecieReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especies = Especie::all();
        $constantes = ConstanteAcida::all();

        foreach ($constantes as $constante) {
            $especie_id = $constante->especie_id;
            $referencia_id = $constante->referencia_id;

            $especie = $especies->find($especie_id);

            if (!$especie->referencias()->find($referencia_id))
            {
                $especie->referencias()->attach($referencia_id);
            }
        }
    }
}