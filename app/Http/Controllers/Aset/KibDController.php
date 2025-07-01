<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\KibD;
use App\Models\Aset\NilaiAktiva;
use Illuminate\Http\Request;

class KibDController extends Controller
{
    public function nilaiD($id)
    {
        $kibD = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',4)
                ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function dep($id)
    {
        $kibD = KibD::select('kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_d_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_d_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function div($dep,$lok)
    {
        $kibD = KibD::select('nama_div','id_div','kib_d_s.id_dep')
                        ->join('divisis','kib_d_s.id_div','=','divisis.id')
                        ->where('kib_d_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $d_full = KibD::select('nama_barang','kode','kib_d_s.id as id_d','nama_div','reg')
                            ->join('barangs','kib_d_s.id_barang','barangs.id')
                            ->join('divisis','kib_d_s.id_div','divisis.id')
                            ->where('kib_d_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $d_full
          ]);
    }

    public function detail($id)
    {
        $d_full = KibD::where('kib_d_s.id',$id)
                            ->join('barangs','kib_d_s.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $d_full
          ]);
    }
}
