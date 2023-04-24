<?php

namespace App\Classes\Search\Filters\IupacAcidConstant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PkTypeFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->pka_type) {

            if ($request->pka_type != 'All'){

                $query->where('pka_type', $request->pka_type);
            
            }
        
        }

        return $query;

    }
}
