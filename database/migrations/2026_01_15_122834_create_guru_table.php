<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama_guru');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('jabatan')->nullable();
            $table->foreignId('wali_kelas_id')->nullable()->constrained('kelas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};

