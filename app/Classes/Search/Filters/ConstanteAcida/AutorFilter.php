<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutorFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->referencia != 'All') {

            if ($request->referencia){

                $query->where('referencia_id', $request->referencia);
            
            }
        
        }

        return $query;

    }
}