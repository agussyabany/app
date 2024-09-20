<?php

namespace App\Models\Diklat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagian extends Model
{
    protected $table = 'bagian_diklat'; // Pastikan nama tabel sesuai
    protected $fillable = ['bagian']; // Kolom yang diizinkan untuk diisi
}

