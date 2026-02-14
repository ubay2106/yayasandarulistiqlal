<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            // pastikan kolomnya unsignedBigInteger
            $table->unsignedBigInteger('guru_id')->change();
            $table->unsignedBigInteger('mapel_id')->change();
            $table->unsignedBigInteger('kelas_id')->change();

            // tambah foreign key RESTRICT
            $table->foreign('guru_id')
                ->references('id')->on('guru')
                ->restrictOnDelete();

            $table->foreign('mapel_id')
                ->references('id')->on('mata_pelajaran')
                ->restrictOnDelete();

            $table->foreign('kelas_id')
                ->references('id')->on('kelas')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropForeign(['mapel_id']);
            $table->dropForeign(['kelas_id']);
        });
    }
};
