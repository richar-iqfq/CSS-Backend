<?php

namespace App\Classes\Search\Filters\Specie;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Author
{
    public static function apply (Builder $query, Request $request)
    {

        if ($request->author) {

                $species = DB::table('reference_specie')
                    ->where('reference_id', $request->author)
                    ->select('specie_id')
                    ->get()
                    ->toArray();
                
                $id = array_column($species, 'specie_id'); 
                
                $query->whereIn('id', $id);
        }

        return $query;

    }
}
