<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('user', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kelas')->nullable(); // ← tambahkan nullable
        $table->string('password');
         $table->string('peran')->default('siswa'); // Tambahan ini
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
