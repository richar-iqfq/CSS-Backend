<?php

namespace App\Classes\Search\Filters\ConstanteAcida;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubstringFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->substring) {

            $query->where('nombre', 'LIKE', '%'.$request->substring.'%');
        
        }

        return $query;

    }
}
