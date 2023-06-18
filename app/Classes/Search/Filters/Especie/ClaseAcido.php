<?php

namespace App\Classes\Search\Filters\Especie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClaseAcido
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->claseAcido) {

                $query->where('clase_acido_id', $request->claseAcido);
                    
        }

        return $query;

    }
}
