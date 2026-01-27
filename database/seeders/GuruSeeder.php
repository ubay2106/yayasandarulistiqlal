<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'username' => 'guru1',
            'password' => Hash::make('guru123'),
            'role' => 'guru'
        ]);

        Guru::create([
            'nip' => '1987654321',
            'nama_guru' => 'Guru Contoh',
            'user_id' => $user->id,
            'jabatan' => 'Guru Kelas',
            'wali_kelas_id' => 1
        ]);
    }
}
