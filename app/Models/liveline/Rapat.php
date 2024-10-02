<?php

namespace App\Models\liveline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan tabel di PostgreSQL
    protected $table = 'll_rapat';

    // Tentukan apakah tabel menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;

    // Kolom-kolom yang bisa diisi melalui mass-assignment
    protected $fillable = [
        'agenda',
        'peserta',
        'tgl',
        'tempat'
    ];

    // Jika kamu ingin menggunakan 'id' sebagai primary key
    protected $primaryKey = 'id';
}
