<?php

namespace App\Http\Controllers;

use App\Http\Resources\EspecieCollection;
use App\Http\Resources\EspecieResource;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspeciesController extends Controller
{
    /**
     * Return json with all the especies in database
     */
    public function index()
    {
        return EspecieResource::collection(Especie::all());
    }

    /**
     * Shows an Specie's details
     * 
     * @return View
     */
    public function show($id)
    {
        $especies = Especie::with(relations: 'constantes')->findOrFail($id);
        return new EspecieResource($especies);
    }
}
