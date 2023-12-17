<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function dep($id)
    {
        $mesin = Gedung::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','gedungs.id_departemen','=','departemens.id')
                        ->join('lokasis','gedungs.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function div($dep,$lok)
    {
        $mesin = Gedung::select('nama_div','id_div','id_departemen')
                        ->join('divisis','gedungs.id_div','=','divisis.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $gedung_full = Gedung::select('nama_barang','guna','gedungs.id as id_gedung','nama_div','img')
                            ->join('barangs','gedungs.id_barang','barangs.id')
                            ->join('divisis','gedungs.id_div','divisis.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }
    public function detail($id)
    {
        $gedung_full = Gedung::where('gedungs.id',$id)
                            ->join('barangs','gedungs.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }
}
