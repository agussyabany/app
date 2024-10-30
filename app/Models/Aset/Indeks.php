<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indeks extends Model
{
    use HasFactory;
    protected $filable = [
        'id',
        'id_departemen',
        'id_div',
        'gedung',
        'fill',
        'rak',
        'no_file',
        'nama_dok',
        'kode_dok',
        'bulan',
        'tahun',
        'ket'

    ];
}
