<?php

namespace App\Classes\Search\Filters\IupacAcidConstant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubstringFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->substring) {

            $query->where('original_iupac_names', 'LIKE', '%'.$request->substring.'%');
        
        }

        return $query;

    }
}
