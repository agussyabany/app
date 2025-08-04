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
        Schema::table('kib_f_s', function (Blueprint $table) {
            $table->string('dok')->nullable(true);
            $table->string('img')->nullable(true);
            $table->integer('input')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kib_f_s', function (Blueprint $table) {
            //
        });
    }
};
