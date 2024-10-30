<?php

namespace App\Models\Soc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'id_device',
        'nama',
        'created_at',
        'updated_at'
    ];

}
