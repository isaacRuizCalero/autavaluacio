<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubriques extends Model
{
    use HasFactory;

    protected $fillable = ['nivell', 'descripcio', 'actiu', 'criteris_avaluacio_id'];

    public function criteriAvaluacio()
    {
        return $this->belongsTo(CriteriAvaluacio::class, 'criteris_avaluacio_id');
    }
}
