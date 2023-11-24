<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Divisi;
use Illuminate\Http\Request;

class Divisicontroller extends Controller
{
    public function save(Request $request)
    {
        $dep = $request->input('dep');
        $nama_div = $request->input('nama');
        $kode_div = $request->input('kode');

        // Insert data into the 'barang' table
        Divisi::insert([
            'id_dep' => $dep,
            'nama_div' => $nama_div,
            'kode_div' => $kode_div,
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $barang = Divisi::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }

    public function update (Request $request)
    {
        $id = $request->input('id');
        $dep = $request->input('dep');
        $nama_div = $request->input('nama');
        $kode_div = $request->input('kode');
        Divisi::where('id',$id)
                ->update([
                    'id_dep' => $dep,
                    'nama_div' => $nama_div,
                    'kode_div' => $kode_div,
                ]);

                return response()->json(['data' => 'update Data Sukses']);

    }
    public function destroy ($id)
    {
        Divisi::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
