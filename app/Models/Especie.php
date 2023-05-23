<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    public function clase_acido()
    {
        return $this->belongsTo(ClaseAcido::class, 'clase_acido_id');
    }

    public function clase_carga()
    {
        return $this->belongsTo(ClaseCarga::class, 'clase_carga_id');
    }

    public function constantes()
    {
        return $this->hasMany(ConstanteAcida::class);
    }

    public function referencias()
    {
        return $this->belongsToMany(Referencia::class);
    }
}
