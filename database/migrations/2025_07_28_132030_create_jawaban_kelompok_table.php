<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawaban_kelompok', function (Blueprint $table) {
            $table->id('id_tabel_jawaban_kelompok');
            $table->string('nama_kelompok');
            $table->string('kelas');
            $table->enum('kategori', ['ecobrick', 'ecoenzim', 'pupukbokashi']);
            $table->text('jawaban');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_kelompok');
    }
};
