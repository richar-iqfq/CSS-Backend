<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConstanteAcida;
use App\Classes\Search\SearchBuilder;
use App\Models\Especie;

class ConstantesController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        $filters_applied = [
            'substring' => null,
            'etiquetas' => null,
            'tipo' => 'All',
            'paso' => 'All',
            'referencia' => 'All'
        ];
        
        return view('constantes.index', compact('especies', 'filters_applied'));
    }

    public function show($id)
    {
        $especie = Especie::findOrFail($id);

        return view('constantes.show_constante', compact('especie'));
    }

    public function filter(Request $request)
    {
        $builder = new SearchBuilder('ConstanteAcida', $request);

        $query = $builder->filter();

        $constantes = $query->get();

        $filters_applied = $this->getFiltersList($request->all());

        // dd($filters_applied);

        return view('constantes.index', compact('constantes', 'filters_applied'));
    }

    private function getFiltersList($request_array)
    {
        $filters_applied = [
            'substring' => null,
            'etiquetas' => null,
            'tipo' => 'All',
            'paso' => 'All',
            'referencia' => 'All'
        ];

        foreach ($filters_applied as $key => $value) {

            if ( array_key_exists($key, $request_array) ){

                    $filters_applied[$key] = $request_array[$key];
                }
        
            }
        
        return $filters_applied;
    }
}