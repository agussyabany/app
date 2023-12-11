<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function show($id)
    {
        $mesin = Mesin::select('kode_dep','id_departemen','nama_dep')
                        ->join('departemens','mesins.id_departemen','=','departemens.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function div($dep)
    {
        $mesin = Mesin::select('nama_div','id_div','id_departemen')
                        ->join('divisis','mesins.id_div','=','divisis.id')
                        ->where('id_departemen',$dep)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }
}
