<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnesHasCriterisAvaluacio extends Model
{
    use HasFactory;

    protected $table = 'alumnes_has_criteris_avaluacio';
    public $timestamps = false;

    protected $fillable = [
        'usuaris_id',
        'criteris_avaluacio_id',
        'nota'
    ];
}
