<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $mapel = [
            'Matematika',
            'Bahasa Indonesia',
            'IPA',
            'IPS',
            'PPKn',
            'Pendidikan Agama'
        ];

        foreach ($mapel as $m) {
            MataPelajaran::create([
                'nama_mapel' => $m
            ]);
        }
    }
}