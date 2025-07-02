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
        Schema::table('kin_operasionals', function (Blueprint $table) {
            $table->renameColumn('KalkulasiJumAir', 'terDistirbusi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kin_operasional', function (Blueprint $table) {
            //
        });
    }
};
