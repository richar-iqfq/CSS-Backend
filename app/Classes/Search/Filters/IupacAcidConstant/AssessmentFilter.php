<?php

namespace App\Classes\Search\Filters\IupacAcidConstant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AssessmentFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->assessment) {

            $query->whereIn('assessment', $request->assessment);
        
        }

        return $query;

    }
}
