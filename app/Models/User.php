<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'role'];

    protected $hidden = ['password'];

    // 1 user = 1 guru
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

}
