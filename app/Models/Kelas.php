<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['nama_kelas'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function waliKelas()
    {
        return $this->hasOne(Guru::class, 'wali_kelas_id');
    }

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class);
    }
}

