<?php

namespace App\Classes\Search\Filters\Especie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Autor
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->autor != 'All') {

                $especies = DB::table('especie_referencia')->where('referencia_id', 1)->select('especie_id')->get();
                
                $id =[];
                foreach ($especies as $especie) {
                    $id[] = $especie->especie_id;
                }

                $query->whereIn('id', $id);
        }

        return $query;

    }
}
