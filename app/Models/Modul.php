<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cicle extends Model
{
    use HasFactory;

    protected $table = 'moduls';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * Get the user that owns the modul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cicle()
    {
        return $this->belongsTo(Cicle::class, 'cicles_id');
    }
}
