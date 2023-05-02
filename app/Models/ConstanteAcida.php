<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstanteAcida extends Model
{
    use HasFactory;

    protected $table = 'constantes_acidas';

    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'referencia_id');
    }

    public function conjugado()
    {
        return static::where('conjugado', $this->id);
    }

}
