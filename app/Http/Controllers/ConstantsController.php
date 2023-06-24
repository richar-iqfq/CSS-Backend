<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Search\SearchBuilder;
use App\Models\Specie;

class ConstantsController extends Controller
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
        $species = Specie::all();
        $filters_applied = $this->filters;
        
        return view('constants.index', compact('species', 'filters_applied'));
    }

    /**
     * Shows an Specie's details
     * 
     * @return View
     */
    public function show($id)
    {
        $specie = Specie::findOrFail($id);

        return view('constants.show_constant', compact('specie'));
    }

    /**
     * Filters the Especies table
     * 
     * @return View
     */
    public function filter(Request $request)
    {
        $builder = new SearchBuilder('Specie', $request);

        $query = $builder->filter();
        
        dd($query);

        $species = $query->get();

        $filters_applied = $this->getFiltersList($request->all());

        return view('constants.index', compact('species', 'filters_applied'));
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