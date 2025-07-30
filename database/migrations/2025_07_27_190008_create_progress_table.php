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
        Schema::create('progress', function (Blueprint $table) {
            $table->id('id_progress');
            $table->unsignedBigInteger('id_user');
            $table->enum('konten_yang_diakses', ['sudah', 'belum']);
            $table->enum('nama_konten', ['membaca', 'bermain', 'berlatih', 'berkolaborasi', 'bekerja', 'menonton']);
            $table->integer('jumlah_akses')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
