<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            // hapus foreign key lama
            $table->dropForeign(['kelas_id']);

            // tambahkan foreign key baru (RESTRICT)
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);

            // kembalikan seperti sebelumnya
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->cascadeOnDelete();
        });
    }
};
