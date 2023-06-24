<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reference extends Model
{
    use HasFactory;

    public function constants(): HasMany
    {
        return $this->hasMany(AcidConstant::class);
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Specie::class);
    }
}
