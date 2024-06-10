<?php
namespace App\Models;

use App\Http\Controllers\Api\CriteriAvaluacioController;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class Usuari extends Authenticable{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nom_usuari',
        'contrasenya',
        'correu',
        'nom',
        'cognom',
        'tipus_usuaris_id',
    ];
    
    protected $table = 'usuaris';
    protected $primaryKey = 'id';

   public  $timestamps = false;


   public function tipus_usuari()
   {
       return $this->belongsTo(TipusUsuari::class, 'tipus_usuaris_id');
   }


   public function moduls() {
       return $this->belongsToMany(Modul::class, 'usuaris_has_moduls', 'usuaris_id', 'moduls_id')
                   ->using(UsuarisHasModuls::class)
                   ->withPivot('usuaris_id', 'moduls_id');
   }


public function criteris_avaluacio(){
    return $this->belongsToMany(CriteriAvaluacioController::class, 'alumnes_has_criteris_avaluacio', 'usuaris_id', 'criteris_avaluacio_id')->withPivot('nota');
}
}