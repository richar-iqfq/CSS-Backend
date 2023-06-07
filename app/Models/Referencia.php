<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Referencia extends Model
{
    use HasFactory;

    public function constantes(): HasMany
    {
        return $this->hasMany(ConstanteAcida::class);
    }

    public function especies(): BelongsToMany
    {
        return $this->belongsToMany(Especie::class);
    }
}
