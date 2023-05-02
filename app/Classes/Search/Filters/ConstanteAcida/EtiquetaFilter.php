<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EtiquetaFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->etiqueta) {

            if ($request->etiqueta != 'All'){

                $query->where('etiqueta', $request->etiqueta);
            
            }
        
        }

        return $query;

    }
}