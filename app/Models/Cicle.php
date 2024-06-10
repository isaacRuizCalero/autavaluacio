<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    use HasFactory;

    protected $fillable = ['sigles', 'descripcio', 'actiu'];

    public function moduls()
    {
        return $this->hasMany(Modul::class);
    }
}
