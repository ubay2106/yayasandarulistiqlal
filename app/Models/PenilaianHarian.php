<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenilaianHarian extends Model
{
    use HasFactory;

    protected $table = 'penilaian_harian';

    protected $fillable = ['guru_id', 'mapel_id', 'kelas_id', 'siswa_id', 'nilai', 'tanggal', 'jenis_nilai'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
