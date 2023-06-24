<?php

namespace App\Http\Controllers;

use App\Classes\Search\SearchBuilder;
use App\Http\Resources\SpecieResource;
use App\Models\Specie;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpeciesController extends Controller
{
    protected $valid_keys = [
        'author',
        'acidType',
        'chargeType',
        'substring'
    ];

    /**
     * Return json with all the especies in database
     */
    public function index()
    {
        $species = Specie::all();
    
        return response(SpecieResource::collection($species));
    }

    /**
     * Return an Specie's json details
     */
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'exists:App\Models\Specie,id'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $especie = Specie::with(relations: 'constants')->findOrFail($id);

        return response(new SpecieResource($especie));
    }

    /**
     * Filter the species
     */
    public function filter(Request $request)
    {
        // Get the invalid request parameters
        $invalid_keys = $this->check_keys($request);

        // Validate the incoming parameters
        $validator = Validator::make($request->only($this->valid_keys), [
            'author' => 'integer|Between:1,4',
            'acidType' => 'integer|Between:1,4',
            'chargeType' => 'integer|Between:1,3',
            'substring' => 'string|max:15'
        ]);

        // Check if validation were ok
        if ($validator->fails() or !empty($invalid_keys)) {
            
            if (!empty($invalid_keys)) {
                $validator->errors()->add(
                    'Invalid Parameters',
                    $invalid_keys
                );
            }
            
            return $validator->errors();
        }

        // Instance the filter class
        $builder = new SearchBuilder('Specie', $request);

        // Apply filters
        $query =$builder->filter();

        // Retrieve species
        $species = $query->get();

        return response(SpecieResource::collection($species));
    }

    /**
     * Verifies if incoming data is correct
     */
    public function check_keys(Request $request)
    {
        // Check if request is empty
        if (empty($request->all())) {
            throw new HttpResponseException(
                response()->json([
                    'errors' => 'Any parameter were received',
                    'allowed parameters' => $this->valid_keys
                ])
            );
        }

        // Search for non-valid keys
        $invalid_keys = array_diff(array_keys($request->all()), $this->valid_keys);

        return array_values($invalid_keys);
    }
}
