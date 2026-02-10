<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->unique(['mapel_id', 'kelas_id'], 'unique_pengajar_mapel_kelas');
        });
    }

    public function down(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->dropUnique('unique_pengajar_mapel_kelas');
        });
    }
};
