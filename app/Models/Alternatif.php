<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $fillable = ['nama', 'tipe'];

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
