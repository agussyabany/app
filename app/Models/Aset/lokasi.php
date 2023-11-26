<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'lokasi',
        'alamat',
        'lat',
        'long',
        'img'
    ];
}
