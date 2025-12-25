<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    protected $table = 'proses';

    protected $fillable = [
        'tipe',
        'alternatif',
        'nilai_yi',
        'ranking'
    ];
}
