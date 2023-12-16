<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function dep($id)
    {
        $mesin = Mesin::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','mesins.id_departemen','=','departemens.id')
                        ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function div($dep,$lok)
    {
        $mesin = Mesin::select('nama_div','id_div','id_departemen')
                        ->join('divisis','mesins.id_div','=','divisis.id')
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
        $mesin_full = Mesin::select('nama_barang','merk','guna','tahun','mesins.id as id_mesin','nama_div','img')
                            ->join('barangs','mesins.id_barang','barangs.id')
                            ->join('divisis','mesins.id_div','divisis.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $mesin_full
          ]);
    }

    public function detail($id)
    {
        $mesin_full = Mesin::where('mesins.id',$id)
                            ->join('barangs','mesins.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $mesin_full
          ]);
    }
}
