<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'wisata';

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
