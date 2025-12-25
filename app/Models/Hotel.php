<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected $fillable = [
        'nama',
        'alternatif_id'
    ];

    /**
     * Relasi ke alternatif
     */
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
