<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Arsip;
use App\Models\Aset\Indeks;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function fill($id)
    {
        $fill = Indeks::select('fill')->distinct()->where('gedung',$id)->orderBy('fill','ASC')->get();
        return response()->json([
            'data' => $fill
          ]);
    }

    public function rak($gd)
        {
            // Validate the input
            if (!is_numeric($gd)) {
                return response()->json(['error' => 'Invalid input'], 400);
            }

            // Fetch distinct fills for the specified gedung
            $fills = Indeks::select('fill')
                            ->distinct()
                            ->where('gedung', $gd)
                            ->orderBy('fill', 'ASC')
                            ->get();

            // Prepare the data structure
            $data = [];
            foreach ($fills as $fill) {
                $raks = Indeks::select('rak')
                            ->distinct()
                            ->where('gedung', $gd)
                            ->where('fill', $fill->fill)
                            ->orderBy('rak', 'ASC')
                            ->get();
                $data[] = [
                    'fill' => $fill->fill,
                    'raks' => $raks
                ];
            }

            // Return the data as a JSON response
            return response()->json(['data' => $data]);
        }

        public function detail($ged,$fil,$rak)
    {
        $rak = (string) $rak;
        $detail = Indeks::where('gedung',$ged)
                        ->where('fill',$fil)
                        ->where('rak',$rak)
                        ->orderBy('kode_dok', 'ASC')
                        ->get();
        return response()->json([
            'data' => $detail
          ]);
    }

    public function isi($id)
    {

        $isi = Arsip::where('id_indeks',$id)
                        ->get();
        return response()->json([
            'data' => $isi
          ]);
    }
}
