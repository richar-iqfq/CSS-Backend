<?php

namespace App\Classes\Search\Filters\Especie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClaseCarga
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->claseCarga) {

                $query->where('clase_carga_id', $request->claseCarga);
                    
        }

        return $query;

    }
}
