<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Search\SearchBuilder;
use App\Models\Especie;

class ConstantesController extends Controller
{
    /**
     * Used filters
     */
    protected $filters = [
        'substring' => null,
        'clase_acido' => 'All',
        'clase_carga' => 'All',
        'autor' => 'All'
    ];

    /**
     * Shows all the especies table
     * 
     * @return View
     */
    public function index()
    {
        $especies = Especie::all();
        $filters_applied = $this->filters;
        
        return view('constantes.index', compact('especies', 'filters_applied'));
    }

    /**
     * Shows an Specie's details
     * 
     * @return View
     */
    public function show($id)
    {
        $especie = Especie::findOrFail($id);

        return view('constantes.show_constante', compact('especie'));
    }

    /**
     * Filters the Especies table
     * 
     * @return View
     */
    public function filter(Request $request)
    {
        $builder = new SearchBuilder('Especie', $request);

        $query = $builder->filter();
        
        $especies = $query->get();

        $filters_applied = $this->getFiltersList($request->all());

        return view('constantes.index', compact('especies', 'filters_applied'));
    }

    /**
     * Builds the filter list implemented in last request
     * 
     * @var $request_array
     * @return array
     */
    private function getFiltersList($request_array)
    {
        $filters_applied = $this->filters;

        foreach ($filters_applied as $key => $value) {

            if ( array_key_exists($key, $request_array) ){

                    $filters_applied[$key] = $request_array[$key];
                }
        
            }
        
        return $filters_applied;
    }
}