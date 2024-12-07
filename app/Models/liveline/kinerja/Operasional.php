<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;
    protected $table = 'kin_operasionals';

    protected $fillable = [
        'VolProdRil',
        'KpstsTrpsng',
        'terDistirbusi',
        'JmlAirDist',
        'JmlWktPly',
        'Plgnlayan',
        'PlgnAktiv',
        'MtrAirGnti',
        'bulanTahun'
    ];
}
