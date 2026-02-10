<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'status',
        'created_by'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

