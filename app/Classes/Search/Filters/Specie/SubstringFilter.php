<?php

namespace App\Classes\Search\Filters\Specie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubstringFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->substring) {
            
            $query->where('name', 'LIKE', '%'.$request->substring.'%');
        
        }

        return $query;

    }
}
