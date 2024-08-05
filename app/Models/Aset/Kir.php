<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kir extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_barang',
        'id_departemen',
        'id_div',
        'gedung',
        'ruangan',
        'id_lokasi',
        'kode',
        'merk',
        'bahan',
        'jumlah',
        'satuan',
        'baik',
        'ringan',
        'berat',
        'ket',
        'id_user',
        'img',
        'input',
        'nilai_v',//tambah ini di db
    ];
    public static function maxId()
    {
        return self::max('id');
    }

}
