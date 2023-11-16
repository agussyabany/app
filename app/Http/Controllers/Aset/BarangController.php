<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function save(Request $request)
    {
        $golongan = $request->input('gol');
        $nama_barang = $request->input('nama');
        $kode_barang = $request->input('kode');

        // Insert data into the 'barang' table
        Barang::insert([
            'golongan' => $golongan,
            'nama_barang' => $nama_barang,
            'kode_barang' => $kode_barang,
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }
}
