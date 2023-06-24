<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specie extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at', 'created_at'];

    protected $casts = [
        'calculatedMolarWeight' => 'bool',
        'molarWeight' => 'decimal:3',
        'density' => 'decimal:3',
        'meltingPoint' => 'decimal:2',
        'boilingPoint' => 'decimal:2'
    ];

    public function acidType(): BelongsTo
    {
        return $this->belongsTo(AcidType::class, 'acidType_id');
    }

    public function chargeType(): BelongsTo
    {
        return $this->belongsTo(ChargeType::class, 'chargeType_id');
    }

    public function constants(): HasMany
    {
        return $this->hasMany(AcidConstant::class);
    }

    public function references(): BelongsToMany
    {
        return $this->belongsToMany(Reference::class);
    }
}
