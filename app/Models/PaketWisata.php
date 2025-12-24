<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'nama',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
    ];
}
