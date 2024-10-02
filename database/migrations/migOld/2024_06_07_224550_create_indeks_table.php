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
        Schema::create('indeks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_departemen')->nullable(true);
            $table->integer('id_div')->nullable(true);
            $table->integer('gedung')->nullable(true);
            $table->integer('fill')->nullable(true);
            $table->integer('no_file')->nullable(true);
            $table->char('nama_dok')->nullable(true);
            $table->integer('kode_dok')->nullable(true);
            $table->integer('bulan')->nullable(true);
            $table->year('tahun')->nullable(true);
            $table->text('ket')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indeks');
    }
};
