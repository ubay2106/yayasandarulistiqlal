<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = ['nip', 'nama_guru', 'foto', 'tanggal_lahir', 'user_id', 'jabatan', 'wali_kelas_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
{
    static::deleting(function ($guru) {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        if ($guru->user) {
            $guru->user->delete();
        }
    });
}

    public function waliKelas()
    {
        return $this->belongsTo(Kelas::class, 'wali_kelas_id');
    }

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class);
    }

    public function penilaianHarian()
    {
        return $this->hasMany(PenilaianHarian::class);
    }
}
