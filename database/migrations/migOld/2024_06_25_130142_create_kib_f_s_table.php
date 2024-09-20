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
        Schema::create('kib_f_s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lokasi')->nullable(true);
            $table->integer('id_dep')->nullable(true);
            $table->integer('id_div')->nullable(true);
            $table->integer('id_barang')->nullable(true);
            $table->text('urai')->nullable(true);
            $table->char('tahun')->nullable(true);
            $table->char('type')->nullable(true);
            $table->char('struktur')->nullable(true);
            $table->char('materi')->nullable(true);
            $table->char('luas')->nullable(true);
            $table->char('letak')->nullable(true);
            $table->char('status_tanah')->nullable(true);
            $table->char('asal')->nullable(true);
            $table->char('status_aset')->nullable(true);
            $table->integer('nilai')->nullable(true);
            $table->text('ket')->nullable(true);
            $table->integer('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kib_f_s');
    }
};
