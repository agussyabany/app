<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function show($id)
    {
        $mesin = Mesin::select('kode_dep','id_departemen')
                        ->join('departemens','mesins.id_departemen','=','departemens.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }
}
