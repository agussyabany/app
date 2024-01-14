<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Ruangan;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function save(Request $request)
    {

        $nama_ruang = $request->input('nama');
        $kode_ruang = $request->input('kode');

        // Insert data into the 'barang' table
        Ruangan::insert([

            'nama_ruang' => $nama_ruang,
            'kode' => $kode_ruang,
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $ruang = Ruangan::where('id',$id)->get();
        return response()->json(['data' => $ruang]);

    }

    public function update (Request $request)
    {
        $id = $request->input('id');

        $nama_ruang = $request->input('nama');
        $kode_ruang = $request->input('kode');
        Ruangan::where('id',$id)
                ->update([

                    'nama_ruang' => $nama_ruang,
                    'kode' => $kode_ruang,
                ]);

                return response()->json(['data' => 'update Data Sukses']);

    }

    public function destroy ($id)
    {
        Ruangan::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
