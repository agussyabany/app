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
        Schema::create('sdms', function (Blueprint $table) {
            $table->id();
            $table->char('nama_sdm');
            $table->char('nip');
            $table->integer('id_jabat');
            $table->integer('id_div');
            $table->integer('id_dep');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdms');
    }
};
