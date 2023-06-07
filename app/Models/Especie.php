<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especie extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at', 'created_at'];

    public function claseAcido(): BelongsTo
    {
        return $this->belongsTo(ClaseAcido::class, 'clase_acido_id');
    }

    public function claseCarga(): BelongsTo
    {
        return $this->belongsTo(ClaseCarga::class, 'clase_carga_id');
    }

    public function constantes(): HasMany
    {
        return $this->hasMany(ConstanteAcida::class);
    }

    public function referencias(): BelongsToMany
    {
        return $this->belongsToMany(Referencia::class);
    }
}
