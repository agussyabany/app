<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show($id)
    {
        $pdf = Pdf::where('id_tanah',$id)->where('gol','a')->get();
        return response()->json([
            'data' => $pdf
          ]);
    }
}
