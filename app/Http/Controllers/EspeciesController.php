<?php

namespace App\Http\Controllers;

use App\Classes\Search\SearchBuilder;
use App\Http\Resources\EspecieResource;
use App\Models\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EspeciesController extends Controller
{
    /**
     * Return json with all the especies in database
     */
    public function index()
    {
        return response(EspecieResource::collection(Especie::all()));
    }

    /**
     * Return an Specie's json details
     */
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'exists:App\Models\Especie,id'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $especie = Especie::with(relations: 'constantes')->findOrFail($id);

        return response(new EspecieResource($especie));
    }

    /**
     * Return json with filtered species
     */
    public function filter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'autor' => 'integer|Between:1,4',
            'claseAcido' => 'integer|Between:1,4',
            'claseCarga' => 'integer|Between:1,3',
            'substring' => 'string|max:15'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $builder = new SearchBuilder('Especie', $request);

        $query =$builder->filter();

        $especies = $query->get();

        return response(EspecieResource::collection($especies));
    }
}
