<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $divsi = [

        'id',
        'id_dep',
        'kode_div',
        'nama_div'

    ];
}
