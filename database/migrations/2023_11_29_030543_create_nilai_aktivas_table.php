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
        Schema::create('nilai_aktivas', function (Blueprint $table) {
            $table->id();
            $table->string('no_voucher');
            $table->date('tgl_voucher');
            $table->integer('id_aktiva');
            $table->integer('nilai');
            $table->text('urai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_aktivas');
    }
};
