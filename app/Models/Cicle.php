<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class cicle extends Model
{
    use HasFactory;

    protected $table = 'cicles';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * Get all of the comments for the cicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduls()
    {
        return $this->hasMany(Modul::class, 'cicles_id');
    }
}
