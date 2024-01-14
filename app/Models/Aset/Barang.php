<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'golongan',
        'nama_barang',
        'kode_barang'
    ];
}
