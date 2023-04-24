<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $table = 'references';

    public $incrementing = false;
    
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function constants()
    {
        return $this->hasMany(IupacAcidConstant::class);
    }
}
