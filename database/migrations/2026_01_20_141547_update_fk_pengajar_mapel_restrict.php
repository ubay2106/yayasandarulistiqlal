<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            // hapus foreign key lama
            $table->dropForeign(['mapel_id']);

            // tambah foreign key baru (RESTRICT)
            $table->foreign('mapel_id')
                  ->references('id')
                  ->on('mata_pelajaran')
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);

            // kembalikan seperti semula (misalnya cascade)
            $table->foreign('mapel_id')
                  ->references('id')
                  ->on('mata_pelajaran')
                  ->cascadeOnDelete();
        });
    }
};
