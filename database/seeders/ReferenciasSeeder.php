<?php

namespace Database\Seeders;

use App\Models\Referencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenciasSeeder extends Seeder
{
    /**
     * Load array from json
     */
    private function load_json($file)
    {
        $referencia_json = file_get_contents($file);

        $decoded_json = json_decode($referencia_json, true);
    
        return $decoded_json;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = 'public/referencias.json';
        $data = $this->load_json($file);

        foreach ($data as $key => $value) {
            Referencia::create([
                'nombre' => $value['nombre']
            ]);
        }
    }
}
