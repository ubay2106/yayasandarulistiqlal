<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';

    protected $fillable = ['nama_mapel'];

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class, 'mapel_id');
    }

    public function penilaianHarian()
    {
        return $this->hasMany(PenilaianHarian::class, 'mapel_id');
    }
}

