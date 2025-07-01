<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemateri extends Model
{
    use HasFactory;

    protected $table = 'pemateri_diklat'; // Pastikan nama tabel sesuai
    protected $fillable = ['pemateri']; 
}
