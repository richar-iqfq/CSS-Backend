<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseAcido extends Model
{
    use HasFactory;

    public function especies()
    {
        return $this->hasMany(Especie::class);
    }
}
