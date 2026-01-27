<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            $table->string('jenis_nilai', 30)
                  ->after('tanggal')
                  ->default('harian');
        });
    }

    public function down(): void
    {
        Schema::table('penilaian_harian', function (Blueprint $table) {
            $table->dropColumn('jenis_nilai');
        });
    }
};
