<?php

namespace App\Models\Diklat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagian extends Model
{
    protected $table = 'pemateri_diklat'; // Pastikan nama tabel sesuai
    protected $fillable = ['pemateri']; // Kolom yang diizinkan untuk diisi
}
