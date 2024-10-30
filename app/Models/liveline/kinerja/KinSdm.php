<?php

namespace App\Models\liveline\kinerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinSdm extends Model
{
    use HasFactory;
    protected $fillable = [
        'JmlPgwai',
        'JmlPlgn1000',
        'JmlPegDiklat',
        'RealByDiklat',
        'RealByPeg'
    ];
}
