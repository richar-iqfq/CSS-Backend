<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConstanteAcida extends Model
{
    use HasFactory;
    
    protected $table = 'constantes_acidas';

    protected $casts = [
        'ka1' => 'string',
        'ka2' => 'string',
        'ka3' => 'string',
        'ka4' => 'string',
        'ka5' => 'string',
        'pka1' => 'decimal:2',
        'pka2' => 'decimal:2',
        'pka3' => 'decimal:2',
        'pka4' => 'decimal:2',
        'pka5' => 'decimal:2'
    ];

    public function referencia(): BelongsTo
    {
        return $this->belongsTo(Referencia::class, 'referencia_id');
    }

    public function especie(): BelongsTo
    {
        return $this->belongsTo(Especie::class, 'especie_id');
    }

    public function ka_values()
    {   
        $values = array(
            $this->ka1,
            $this->ka2,
            $this->ka3,
            $this->ka4,
            $this->ka5,
        );

        // $ka = array_filter($values, fn($n) => !is_null($n));

        return $values;
    }

    public function pka_values()
    {
        $values = array(
            $this->pka1,
            $this->pka2,
            $this->pka3,
            $this->pka4,
            $this->pka5,
        );

        // $pka = array_filter($values, fn($n) => !is_null($n));

        return $values;
    }

}
