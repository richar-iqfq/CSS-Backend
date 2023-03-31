<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    // protected $table = 'my_professions'; // Change model table

    // public $timestamps = false; // for not updating date

    protected $fillable = ['title'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
