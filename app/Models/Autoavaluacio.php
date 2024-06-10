<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoavaluacio extends Model
{
    use HasFactory;

    protected $table = 'autoavaluacions';
    protected $fillable = ['user_id', 'criteri_avaluacio_id', 'nota'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function criteriAvaluacio()
    {
        return $this->belongsTo(CriteriAvaluacio::class);
    }
}
