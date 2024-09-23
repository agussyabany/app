<?php

namespace App\Models\Diklat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'diklat_pegawai';
    protected $fillable = ['nama_pegawai', 'nip', 'jabatan', 'bagian', 'img'];
        public $timestamps = false;
    // Menentukan kolom mana saja yang boleh diisi secara massal
    // protected $guarded = [];

  

    
}
