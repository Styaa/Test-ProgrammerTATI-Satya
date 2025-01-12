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
        Schema::create('performa_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->enum('hasil_kerja', ['di bawah ekspektasi', 'sesuai ekspektasi', 'di atas ekspektasi']);
            $table->enum('perilaku', ['di bawah ekspektasi', 'sesuai ekspektasi', 'di atas ekspektasi']);
            $table->string('predikat_kinerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performa_pegawai');
    }
};
