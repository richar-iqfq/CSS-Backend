<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EtiquetasFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->etiquetas) {

            if ($request->etiquetas){

                $query->where('etiquetas', 'LIKE', '%'.$request->etiquetas.'%');
            
            }
        
        }

        return $query;

    }
}