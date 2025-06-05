<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAktiva extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_voucher',
        'tgl_voucher',
        'id_aktiva',
        'nilai',
        'urai',
        'user',
        'tahun',
        'id_lokasi',
        'dep',
        'div',
        'cat'

    ];
}
