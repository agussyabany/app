<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Barang;
use App\Models\Aset\KibE;
use App\Models\Aset\NilaiAktiva;
use Illuminate\Http\Request;

class KibEContrller extends Controller
{
    public function nilaiE($id)
    {
        $kibE = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',6)
                ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function dep($id)
    {
        $kibE = KibE::select('kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_e_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_e_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function div($dep,$lok)
    {
        $kibE = KibE::select('nama_div','id_div','kib_e_s.id_dep')
                        ->join('divisis','kib_e_s.id_div','=','divisis.id')
                        ->where('kib_e_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $e_full = KibE::select('nama_barang','kode','kib_e_s.id as id_e','nama_div','reg')
                            ->join('barangs','kib_e_s.id_barang','barangs.id')
                            ->join('divisis','kib_e_s.id_div','divisis.id')
                            ->where('kib_e_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $e_full
          ]);
    }

    public function detail($id)
    {
        $e_full = KibE::where('kib_e_s.id',$id)
                            ->join('barangs','kib_e_s.id_barang','barangs.id')
                            ->join('bahans','kib_e_s.id_bahan','bahans.id')
                            ->get();
        return response()->json([
            'data' => $e_full
          ]);
    }

    public function barang ($id)
    {
        $barang = Barang::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }
}
