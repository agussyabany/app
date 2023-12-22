<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Kir;
use Illuminate\Http\Request;

class KirController extends Controller
{
    public function dep($id)
    {
        $kir = Kir::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kirs.id_departemen','=','departemens.id')
                        ->join('lokasis','kirs.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

    public function div($dep,$lok)
    {
        $kir = Kir::select('nama_div','id_div','id_departemen')
                        ->join('divisis','kirs.id_div','=','divisis.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

    public function gedung($lok,$dep,$div)
    {
        $gedung_full = Kir::select('gedung')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->distinct('gedung')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function ruang($lok,$dep,$div,$ged)
    {
        $gedung_full = Kir::select('ruangan')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->where('gedung',$ged)
                            ->distinct('ruangan')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function detail($lok,$dep,$div,$ged,$ruang)
    {
        $ruang_detail = Kir::join('barangs','kirs.id_barang','=','barangs.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->where('gedung',$ged)
                            ->where('ruangan',$ruang)
                            ->get();
        return response()->json([
            'data' => $ruang_detail
          ]);
    }
}
