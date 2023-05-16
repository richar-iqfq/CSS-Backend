<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PasoFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->paso != 'All') {

                $query->where('paso', $request->paso);
        
        }

        return $query;

    }
}