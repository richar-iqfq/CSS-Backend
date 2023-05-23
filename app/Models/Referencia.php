<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;

    public function constantes()
    {
        return $this->hasMany(ConstanteAcida::class);
    }

    public function especies()
    {
        return $this->belongsToMany(Especie::class);
    }
}