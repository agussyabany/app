<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Bahan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BahanController extends Controller
{
    public function save(Request $request)
    {

        $nama_bahan = $request->input('nama');

        Bahan::insert([
            'nama' => $nama_bahan
        ]);

        Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
        return redirect('/bahans');
        //return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $bahan = Bahan::where('id',$id)->get();
        return response()->json(['data' => $bahan]);

    }

    public function update (Request $request)
    {
        $id = $request->input('id');

        $nama_bahan = $request->input('nama');
        Bahan::where('id',$id)
                ->update([

                    'nama' => $nama_bahan,
                ]);

                Alert::success('BERHASIL','DATA BERHASIL DIUPDATE');
                return redirect('/bahans');
                //return response()->json(['data' => 'update Data Sukses']);

    }

    public function destroy ($id)
    {
        Bahan::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
