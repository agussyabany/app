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
        Schema::create('mesins', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_departemen');
            $table->integer('id_div');
            $table->integer('id_lokasi');
            $table->string('kode');
            $table->string('reg');
            $table->string('tahun');
            $table->integer('harga');
            $table->integer('susut');
            $table->string('bahan');
            $table->string('asal');
            $table->string('ukuran');
            $table->string('merk');
            $table->string('pabrik');
            $table->string('rangka');
            $table->string('mesin');
            $table->string('polisi');
            $table->string('bpkb');
            $table->string('ket');
            $table->string('img');
            $table->string('guna');
            $table->string('struktur');
            $table->integer('user');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesins');
    }
};
