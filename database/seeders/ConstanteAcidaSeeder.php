<?php

namespace Database\Seeders;

use App\Models\ConstanteAcida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Classes\Loader\CsvLoader;

class ConstanteAcidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/constantes_acidas.csv');
        $data = CsvLoader::load($file);
        
        foreach ($data as $key => $line) {
            ConstanteAcida::create([
                'especie_id' => $line['especie_id'],
                'valor_reportado' => $line['valor_reportado'],
                'ka1' => $line['ka1']=="" ? null : floatval($line['ka1']),
                'ka2' => $line['ka2']=="" ? null : floatval($line['ka2']),
                'ka3' => $line['ka3']=="" ? null : floatval($line['ka3']),
                'ka4' => $line['ka4']=="" ? null : floatval($line['ka4']),
                'ka5' => $line['ka5']=="" ? null : floatval($line['ka5']),
                'pka1' => $line['pka1']=="" ? null : floatval($line['pka1']),
                'pka2' => $line['pka2']=="" ? null : floatval($line['pka2']),
                'pka3' => $line['pka3']=="" ? null : floatval($line['pka3']),
                'pka4' => $line['pka4']=="" ? null : floatval($line['pka4']),
                'pka5' => $line['pka5']=="" ? null : floatval($line['pka5']),
                'nota' => $line['nota'],
                'referencia_id' => $line['referencia_id']
            ]);
        }
    }
}
