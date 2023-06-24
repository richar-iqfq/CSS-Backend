<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChargeType extends Model
{
    use HasFactory;

    protected $table = 'chargeTypes';

    public function species(): HasMany
    {
        return $this->hasMany(Specie::class);
    }
}
