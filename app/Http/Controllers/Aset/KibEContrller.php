<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
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
}
