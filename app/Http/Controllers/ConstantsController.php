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
        $oldRequest = null;
        
        return view('constants.index', compact('constants', 'oldRequest'));
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

        $oldRequest = $request;

        return view('constants.index', compact('constants', 'oldRequest'));
    }
}
