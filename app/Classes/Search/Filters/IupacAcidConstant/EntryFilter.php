<?php

namespace App\Classes\Search\Filters\IupacAcidConstant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EntryFilter
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->entry) {

            $query->where('entry', $request->entry);
        
        }

        return $query;

    }
}
