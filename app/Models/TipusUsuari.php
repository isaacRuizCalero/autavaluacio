<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipusUsuari extends Model
{
    use HasFactory;

    protected $table = 'tipus_usuaris';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tipus',
        'actiu',
    ];

    public function usuaris()
    {
        return $this->hasMany(Usuari::class, 'tipus_usuaris_id');
    }


}
