<?php

namespace App\Classes\Search\Filters\Especie;

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
