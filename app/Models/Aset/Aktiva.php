<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktiva extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'aktiva',
        'kode',
        'gol',
        'kib'
    ];
}
