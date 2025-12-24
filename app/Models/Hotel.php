<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected $fillable = [
        'nama',
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
    ];
}
