<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = ['nama', 'jenis', 'bobot', 'tipe'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
