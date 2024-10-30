<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;

    protected $fillable = [
        'VolProdRil',
        'KpstsTrpsng',
        'KalkulasiJumAir',
        'JmlAirDist',
        'JmlWktPly',
        'Plgnlayan',
        'PlgnAktiv',
        'MtrAirGnti'
    ];
}
