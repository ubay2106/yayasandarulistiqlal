<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('pengajar', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);

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

            $table->foreign('mapel_id')
                  ->references('id')
                  ->on('mata_pelajaran')
                  ->cascadeOnDelete();
        });
    }
};
