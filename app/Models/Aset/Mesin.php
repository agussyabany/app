<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'id_departemen',
        'id_div',
        'id_lokasi',
        'kode',
        'reg',
        'tahun',
        'harga',
        'susut',
        'ukuran',
        'merk',
        'pabrik',
        'rangka',
        'mesin ',
        'polisi',
        'bpkb ',
        'ket',
        'guna',
        'id_user',
        'created_at',
        'img ',
        'input',
        'bahan',
        'asal',
        'id'

    ];

    public static function maxId()
    {
        return self::max('id');
    }
}
