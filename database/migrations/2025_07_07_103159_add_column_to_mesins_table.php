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
        Schema::table('mesins', function (Blueprint $table) {
            $table->integer('jenis')->nullable(true);
            $table->bigInteger('id_voucher2')->nullable(true);
            $table->string('fungsi')->nullable(true);
            $table->string('kodisi')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mesins', function (Blueprint $table) {
            //
        });
    }
};
