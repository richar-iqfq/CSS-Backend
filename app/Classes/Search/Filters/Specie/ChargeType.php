<?php

namespace App\Classes\Search\Filters\Specie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ChargeType
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->chargeType) {

                $query->where('chargeType_id', $request->chargeType);
                    
        }

        return $query;

    }
}
