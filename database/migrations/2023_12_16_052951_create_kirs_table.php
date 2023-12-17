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
        Schema::create('kirs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->string('ruangan');
            $table->integer('id_departemen');
            $table->integer('id_div');
            $table->integer('id_lokasi');
            $table->string('gedung');
            $table->string('merk');
            $table->string('bahan');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('baik');
            $table->integer('ringan');
            $table->integer('berat');
            $table->integer('nilai');
            $table->string('img');
            $table->text('ket');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kirs');
    }
};
