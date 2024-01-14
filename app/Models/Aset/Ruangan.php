<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nama_ruang',
        'kode',
    ];
}
