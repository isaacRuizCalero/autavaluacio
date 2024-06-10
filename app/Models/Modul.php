<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = ['codi', 'sigles', 'nom', 'actiu', 'cicles_id'];

    public function cicle()
    {
        return $this->belongsTo(Cicle::class);
    }
}
