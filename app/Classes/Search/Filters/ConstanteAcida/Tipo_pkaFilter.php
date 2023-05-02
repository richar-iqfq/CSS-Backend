<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Tipo_pkaFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->tipo_pka) {

            if ($request->tipo_pka != 'All'){

                $query->where('tipo_pka', $request->tipo_pka);
            
            }
        
        }

        return $query;

    }
}
