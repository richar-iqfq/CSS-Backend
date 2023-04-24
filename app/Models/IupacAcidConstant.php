<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IupacAcidConstant extends Model
{
    use HasFactory;

    protected $table = 'iupac_acid_constants';

    public function reference()
    {
        return $this->belongsTo(Reference::class, 'reference_id');
    }
}
