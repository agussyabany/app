<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    
    protected $fillable =  [
        'labaStlPjk',
        'jmlEkuitas',
        'biayaOps',
        'PndptnOps',
        'kaStrkas',
        'HutangLancar',
        'JmlPnrmRekAir',
        'jmlRekAir',
        'TotalAktiva',
        'TotalHutang',
        'bulanTahun'

    ];
}
