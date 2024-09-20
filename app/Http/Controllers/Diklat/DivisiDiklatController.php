<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use App\Models\Aset\Divisi;
use Illuminate\Http\Request;

class DivisiDiklatController extends Controller
{
    public function divisidiklat()
    {
        $on=3;
        $divisi=Divisi::get();
        return view('diklat.pages.divisidiklat',compact(['on'], 'divisi'));
    }

    public function save( Request $request)
    {
     
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|email|string|max:255',
            'jabatan' => 'required|min:1|numeric',
            'divisi' => 'required|numeric',
            // 'upload' => 'required|file|mimes:pdf,doc,docx|max:2048',  // Validasi untuk file
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi untuk gambar

        ]);
        return $request;
    }
}

