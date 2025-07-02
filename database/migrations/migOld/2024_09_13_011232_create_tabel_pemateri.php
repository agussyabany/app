<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tabel_pemateri', function (Blueprint $table) {
            $table->id();
            $table->char('nama_pemateri');
            $table->char('asal');
            $table->string('image')->nullable(); //menambahkan kolom foto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_pemateri');
    }
};
