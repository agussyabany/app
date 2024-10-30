<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
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
        'JmlPlgnDom'
    ];
}
