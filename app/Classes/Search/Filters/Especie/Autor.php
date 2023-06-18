<?php

namespace App\Classes\Search\Filters\Especie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Autor
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->autor) {

                $especies = DB::table('especie_referencia')
                    ->where('referencia_id', $request->autor)
                    ->select('especie_id')
                    ->get()
                    ->toArray();
                
                $id = array_column($especies, 'especie_id'); 
                
                $query->whereIn('id', $id);
        }

        return $query;

    }
}
