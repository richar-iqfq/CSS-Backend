<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConstanteAcida;
use App\Classes\Search\SearchBuilder;

class ConstantesController extends Controller
{
    public function index()
    {
        $constantes = ConstanteAcida::all();
        $filters_applied = [
            'substring' => null,
            'etiqueta' => 'All',
            'tipo_pka' => 'All'
        ];
        
        return view('constantes.index', compact('constantes', 'filters_applied'));
    }

    public function show($id)
    {
        $constante = ConstanteAcida::findOrFail($id);

        return view('constantes.show_constante', compact('constante'));
    }

    public function filter(Request $request)
    {
        $builder = new SearchBuilder('ConstanteAcida', $request);

        $query = $builder->filter();

        $constantes = $query->get();

        $filters_applied = $this->getFiltersList($request->all());

        return view('constantes.index', compact('constantes', 'filters_applied'));
    }

    private function getFiltersList($request_array)
    {
        $filters_applied = [
            'substring' => null,
            'etiqueta' => 'All',
            'tipo_pka' => 'All'
        ];

        foreach ($filters_applied as $key => $value) {

            if ( array_key_exists($key, $request_array) ){

                    $filters_applied[$key] = $request_array[$key];
                }
        
            }
        
        return $filters_applied;
    }
}

