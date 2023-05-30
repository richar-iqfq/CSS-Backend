<?php

namespace App\Classes\Search\Filters\Especie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClaseCarga
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->clase_carga != 'All') {

                $query->where('clase_carga_id', $request->clase_carga);
                    
        }

        return $query;

    }
}
