<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IupacAcidConstant;
use App\Classes\Search\SearchBuilder;

class ConstantsController extends Controller
{
    public function index()
    {       
        $constants = IupacAcidConstant::all();
        $filters_applied = [
            'substring' => null,
            'entry' => null,
            'pka_type' => 'All',
            'assessment' => []
        ];
        
        return view('constants.index', compact('constants', 'filters_applied'));
    }

    public function show($id)
    {
        $constant = IupacAcidConstant::findOrFail($id);

        return view('constants.show_constant', compact('constant'));
    }

    public function filter(Request $request)
    {
        $builder = new SearchBuilder('IupacAcidConstant', $request);

        $query = $builder->filter();

        $constants = $query->get();

        $filters_applied = $this->getFiltersList($request->all());

        return view('constants.index', compact('constants', 'filters_applied'));
    }

    private function getFiltersList($request_array)
    {
        $filters_applied = [
            'substring' => null,
            'entry' => null,
            'pka_type' => 'All',
            'assessment' => []
        ];

        foreach ($filters_applied as $key => $value) {

            if ( array_key_exists($key, $request_array) ){

                    $filters_applied[$key] = $request_array[$key];
                }
        
            }
        
        return $filters_applied;
    }
}
