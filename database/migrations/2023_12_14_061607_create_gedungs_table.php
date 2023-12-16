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
        Schema::create('gedungs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_div');
            $table->integer('id_departemen');
            $table->integer('id_lokasi');
            $table->string('kode');
            $table->string('reg');
            $table->string('asal');
            $table->integer('nilai');
            $table->integer('susut');
            $table->string('kondisi');
            $table->string('konstruksi');
            $table->string('materi');
            $table->string('status');
            $table->string('luas');
            $table->string('luasT');
            $table->string('kode_tanah');
            $table->string('no_imb');
            $table->date('tgl_imb');
            $table->text('ket');
            $table->string('img');
            $table->string('guna');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedungs');
    }
};
