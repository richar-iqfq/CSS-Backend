<?php

namespace Database\Seeders;

use App\Models\ConstanteAcida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConstantesAcidasSeeder extends Seeder
{
    /**
     * Load array from json
     */
    private function load_json($file)
    {
        $chang_json = file_get_contents($file);

        return json_decode($chang_json, true);
    }
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/constantes_acidasv1.json');
        $data = $this->load_json($file);

        foreach ($data as $key => $value) {
            
            ConstanteAcida::create([
                'nombre' => $value['nombre'],
                'formula' => $value['formula'],
                'disociacion' => $value['disociacion'],
                'tipo' => $value['tipo'],
                'paso' => $value['paso'],
                'valor_ka' => $value['valor_ka'],
                'valor_pka' => $value['valor_pka'],
                'etiquetas' => $value['etiquetas'],
                'referencia_id' => intval($value['referencia'])
            ]);

        }
    }
}
