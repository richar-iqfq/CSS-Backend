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
        $file = 'public/constantes_acidasv1.json';
        $data = $this->load_json($file);

        foreach ($data as $key => $value) {
            
            ConstanteAcida::create([
                'nombre' => $value['nombre'],
                'formula' => $value['formula'],
                'tipo_pka' => $value['tipo_pka'],
                'valor_pk' => floatval($value['valor_pk']),
                'etiqueta' => $value['etiqueta'],
                'ion' => $value['ion'],
                'conjugado' => $value['conjugado'],
                'referencia_id' => intval($value['referencia'])
            ]);

        }
    }
}
