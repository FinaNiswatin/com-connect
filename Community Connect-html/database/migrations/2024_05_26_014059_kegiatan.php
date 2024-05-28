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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan')->autoIncrement();
            $table->string('nama_kegiatan');
            $table->string('gambar_kegiatan');
            $table->date('waktu_pelaksanaan');
            $table->string('lokasi_kegiatan');
            $table->string('kategori');
            $table->integer('jumlah_relawan');
            $table->integer('jumlah_point');
            $table->string('kode_unik');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
