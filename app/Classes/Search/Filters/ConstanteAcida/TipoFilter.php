<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TipoFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->tipo != 'All') {

                $query->where('tipo', $request->tipo);
                    
        }

        return $query;

    }
}
