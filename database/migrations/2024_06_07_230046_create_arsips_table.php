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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->integer('id_indeks')->nullable(true);
            $table->char('reg')->nullable(true);
            $table->char('kondisi')->nullable(true);
            $table->char('rekanan')->nullable(true);
            $table->text('judul')->nullable(true);
            $table->bigInteger('nilai')->nullable(true);
            $table->char('retensi')->nullable(true);
            $table->text('ket')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
