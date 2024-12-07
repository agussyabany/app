<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $table = 'kin_pelayanans';
    protected $fillable = [
        'JmlPnddkTrlyni',
        'jmlPndkWil',
        'kalKulasiJmlPlgn',
        'JmlPlgnThLl',
        'AduanSlsai',
        'JmlAduan',
        'UjiKualitas',
        'titikUji',
        'JmlAirTrjualDom',
        'JmlPlgnDom',
        'bulanTahun'
    ];
}
