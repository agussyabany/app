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
        Schema::create('kib_e_s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang')->nullable(true);
            $table->integer('id_lokasi')->nullable(true);
            $table->integer('id_dep')->nullable(true);
            $table->integer('id_div')->nullable(true);
            $table->char('kode')->nullable(true);   
            $table->char('reg')->nullable(true);
            $table->char('kondisi')->nullable(true);
            $table->integer('id_bahan')->nullable(true);
            $table->char('tahun')->nullable(true);
            $table->integer('jumlah')->nullable(true);
            $table->char('asal')->nullable(true);
            $table->text('ket')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kib_e_s');
    }
};
