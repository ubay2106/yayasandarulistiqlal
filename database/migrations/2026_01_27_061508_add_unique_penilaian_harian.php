<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            $table->unique(
                ['guru_id', 'mapel_id', 'kelas_id', 'siswa_id', 'tanggal'],
                'unique_penilaian_harian'
            );
        });
    }

    public function down(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            $table->dropUnique('unique_penilaian_harian');
        });
    }
};

