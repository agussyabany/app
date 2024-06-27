<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    public function save(Request $request)
    {
        $golongan = $request->input('gol');
        $nama_barang = $request->input('nama');
        $kode_barang = $request->input('kode');
        $Maxid = Barang::max('id');
        $id = $Maxid + 1;

        // Insert data into the 'barang' table
        Barang::insert([
            'id'=> $id,
            'golongan' => $golongan,
            'nama_barang' => $nama_barang,
            'kode_barang' => $kode_barang,
        ]);
        Alert::success('BERHASIL','Data Berhasil Dismpan');
        return redirect('/barangs');
    }

    public function edit($id)
    {
            $barang = Barang::leftJoin('golongans', function($join) {
                $join->on(DB::raw('CAST(barangs.golongan AS bigint)'), '=', 'golongans.id');
            })
            ->where('barangs.id', $id)
            ->select('barangs.id as barId', 'golongans.id as golID','nama_barang','kode_barang','golongan','golongans.nama as nama')
            ->get();
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
                Alert::success('BERHASIL','Data Berhasil Diupdate');
                return redirect('/barangs');
                //return response()->json(['data' => 'update Data Sukses']);

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

    public function mesin()
    {
        $mesin = Barang::where('golongan',6)->get();
        return response()->json(['data' => $mesin]);
    }

    public function gedung()
    {
        $gedung = Barang::where('golongan',2)->get();
        return response()->json(['data' => $gedung]);
    }

    public function kir()
    {
        $kir = Barang::where('golongan',7)->get();
        return response()->json(['data' => $kir]);
    }
}
