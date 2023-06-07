<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClaseCarga extends Model
{
    use HasFactory;

    public function especies(): HasMany
    {
        return $this->hasMany(Especie::class);
    }
}
