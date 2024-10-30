<?php

namespace App\Models\Soc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'id_device',
        'nilai',
        'tsens',
        'created_at',
        'update_at'
    ];
}
