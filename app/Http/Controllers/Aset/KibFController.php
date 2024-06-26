<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\KibF;
use Illuminate\Http\Request;

class KibFController extends Controller
{
    public function dep($id)
    {
        $kibF = KibF::select('kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_f_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_f_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibF
          ]);
    }

    public function div($dep,$lok)
    {
        $kibF = KibF::select('nama_div','id_div','kib_f_s.id_dep')
                        ->join('divisis','kib_f_s.id_div','=','divisis.id')
                        ->where('kib_f_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibF
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $f_full = KibF::select('nama_barang','tahun','kib_f_s.id as id_f','nama_div','nilai')
                            ->join('barangs','kib_f_s.id_barang','barangs.id')
                            ->join('divisis','kib_f_s.id_div','divisis.id')
                            ->where('kib_f_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $f_full
          ]);
    }

    public function detail($id)
    {
        $f_full = KibF::where('kib_f_s.id',$id)
                            ->join('barangs','kib_f_s.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $f_full
          ]);
    }
}
