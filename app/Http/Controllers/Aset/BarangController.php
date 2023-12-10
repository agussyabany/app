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

    public function edit($id)
    {
        $barang = Barang::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }

    public function update (Request $request)
    {
        $id = $request->input('id');
        $golongan = $request->input('gol');
        $nama_barang = $request->input('nama');
        $kode_barang = $request->input('kode');
        Barang::where('id',$id)
                ->update([
                    'golongan' => $golongan,
                    'nama_barang' =>$nama_barang,
                    'kode_barang' =>$kode_barang
                ]);

                return response()->json(['data' => 'update Data Sukses']);

    }

    public function destroy ($id)
    {
        Barang::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }

    public function tanah()
    {
        $tanah = Barang::where('golongan',1)->get();
        return response()->json(['data' => $tanah]);
    }
}
