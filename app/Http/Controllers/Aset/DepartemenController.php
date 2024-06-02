<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Departemen;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Depends;
use RealRashid\SweetAlert\Facades\Alert;

class DepartemenController extends Controller
{
    public function save(Request $request)
    {
        $nama_dep = $request->input('nama');
        $kode_dep = $request->input('kode');

        // Insert data into the 'barang' table
        Departemen::insert([
            'nama_dep' => $nama_dep,
            'kode_dep' => $kode_dep,
        ]);

       
        Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
        return redirect('/depts');
        //return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $dep = Departemen::where('id',$id)->get();
        return response()->json(['data' => $dep]);
    }

    public function update (Request $request)
    {
        $id = $request->input('id');

        $nama_dep = $request->input('nama');
        $kode_dep = $request->input('kode');
        Departemen::where('id',$id)
                ->update([
                    'nama_dep' =>$nama_dep,
                    'kode_dep' =>$kode_dep
                ]);
        Alert::success('BERHASIL','DATA BERHASIL DIUPDATE');
        return redirect('/depts');
                //return response()->json(['data' => 'update Data Sukses']);

    }

    public function destroy ($id)
    {
        Departemen::where('id', $id)->delete();
        $title = 'HAPUS DEPARTEMEN!';
        $text = "Apakah Kamu Yakin?";
        confirmDelete($title, $text);
        return redirect('/depts');
        //return response()->json(['message' => 'Data deleted successfully']);
    }
}
