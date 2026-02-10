<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            // 1. Drop foreign key dulu
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['mapel_id']);
            $table->dropForeign(['kelas_id']);
            $table->dropForeign(['guru_id']);

            // 2. Drop unique lama
            $table->dropUnique('unique_penilaian_harian');

            // 3. Tambah unique baru (dengan jenis_nilai)
            $table->unique(
                ['guru_id', 'mapel_id', 'kelas_id', 'siswa_id', 'tanggal', 'jenis_nilai'],
                'unique_penilaian_harian_jenis'
            );

            // 4. Pasang lagi foreign key
            $table->foreign('siswa_id')->references('id')->on('siswa')->cascadeOnDelete();
            $table->foreign('mapel_id')->references('id')->on('mata_pelajaran')->cascadeOnDelete();
            $table->foreign('kelas_id')->references('id')->on('kelas')->cascadeOnDelete();
            $table->foreign('guru_id')->references('id')->on('guru')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['mapel_id']);
            $table->dropForeign(['kelas_id']);
            $table->dropForeign(['guru_id']);

            $table->dropUnique('unique_penilaian_harian_jenis');

            $table->unique(
                ['guru_id', 'mapel_id', 'kelas_id', 'siswa_id', 'tanggal'],
                'unique_penilaian_harian'
            );

            $table->foreign('siswa_id')->references('id')->on('siswa')->cascadeOnDelete();
            $table->foreign('mapel_id')->references('id')->on('mata_pelajaran')->cascadeOnDelete();
            $table->foreign('kelas_id')->references('id')->on('kelas')->cascadeOnDelete();
            $table->foreign('guru_id')->references('id')->on('guru')->cascadeOnDelete();
        });
    }
};
