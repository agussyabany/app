<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::rename('divisi', 'diklat_bagian'); // Ganti 'nama_baru' dengan nama tabel baru
    }

    /**
     * Kembalikan migrasi.
     */
    public function down(): void
    {
        Schema::rename('diklat_bagian', 'divisi'); // Jika rollback, kembalikan ke 'divisi'
    }
};
