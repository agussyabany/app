<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_lokasi',
        'id_barang',
        'guna',
        'tahun',
        'no_tunjuk',
        'tgl_tunjuk',
        'luas_tunjuk',
        'sertifikat',
        'tgl_sertifikat',
        'luas_sertifikat',
        'no_gambar',
        'tgl_gambar',
        'luas_gambar',
        'hak',
        'asal',
        'pemilik',
        'nilai',
        'nilai_now',
        'ket',
        'user'
    ];
}
