<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcidType extends Model
{
    use HasFactory;

    protected $table = 'acidTypes';

    public function species(): HasMany
    {
        return $this->hasMany(Specie::class);
    }
}
