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
        Schema::create('kib_d_s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lokasi')->nullable(true);
            $table->integer('id_dep')->nullable(true);
            $table->integer('id_div')->nullable(true);
            $table->integer('id_barang')->nullable(true);
            $table->char('kode')->nullable(true);
            $table->char('reg')->nullable(true);
            $table->char('kondisi')->nullable(true);
            $table->char('struktur')->nullable(true);
            $table->char('materi')->nullable(true);
            $table->char('luas_lantai')->nullable(true);
            $table->char('tgl_dok')->nullable(true);
            $table->char('no_dok')->nullable(true);
            $table->char('luas')->nullable(true);
            $table->char('status')->nullable(true);
            $table->char('kode_tanah')->nullable(true);
            $table->char('asal')->nullable(true);
            $table->integer('harga')->nullable(true);
            $table->text('ket')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->integer('nilai_v')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kib_d_s');
    }
};
