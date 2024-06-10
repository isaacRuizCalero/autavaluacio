<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriAvaluacio extends Model
{
    use HasFactory;

    protected $table = 'criteris_avaluacio';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function resultats_aprenentatge()
    {
        return $this->belongsTo(ResultatAprenentatge::class, 'resultats_aprenentatge_id');
    }

    public function rubriques()
    {
        return $this->hasMany(Rubriques::class, 'criteris_avaluacio_id');
    }

    public function usuaris()
    {
        return $this->belongsToMany(Usuari::class, 'alumnes_has_criteris_avaluacio', 'criteris_avaluacio_id', 'usuaris_id')->withPivot('nota');
    }
}
