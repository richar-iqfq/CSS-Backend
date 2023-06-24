<?php

namespace App\Classes\Search\Filters\Specie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AcidType
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->acidType) {

                $query->where('acidType_id', $request->acidType);
                
        }

        return $query;

    }
}
