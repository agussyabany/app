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
        Schema::create('tanahs', function (Blueprint $table) 
        {
            $table->id();
            $table->integer('id_lokasi');
            $table->integer('id_barang');
            $table->string('guna');
            $table->string('tahun');
            $table->string('no_tunjuk');
            $table->date('tgl_tunjuk');
            $table->string('luas_tunjuk');
            $table->string('sertifikat');
            $table->date('tgl_sertifikat');
            $table->string('luas_sertifikat');
            $table->string('no_gambar');
            $table->string('tgl_gambar');
            $table->string('luas_gambar');
            $table->string('hak');
            $table->string('asal');
            $table->string('pemilik');
            $table->integer('nilai');
            $table->integer('nilai_now');
            $table->text('ket');
            $table->integer('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanahs');
    }
};
