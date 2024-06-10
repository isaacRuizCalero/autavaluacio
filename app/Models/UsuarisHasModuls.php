<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UsuarisHasModuls extends Pivot
{
    protected $fillable = ['usuaris_id', 'moduls_id'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuaris_id');
    }

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'moduls_id');
    }
}
