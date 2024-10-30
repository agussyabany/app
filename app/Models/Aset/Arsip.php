<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_indeks',
        'reg',
        'kondisi',
        'rekanan',
        'judul',
        'nilai',
        'retensi',
        'ket'
    ];
}
