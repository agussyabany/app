<?php

namespace App\Http\Controllers\LiveLine\AdminKinerja;

use App\Http\Controllers\Controller;
use App\Models\liveline\kinerja\Operasional;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;

class AdmOprsController extends Controller
{
    public function data ()
    {
        $on = 15;
        $no = 1;
        $operasional = Operasional::all();

        return view('Liveline.pages.adminKinerja.aOperasional',compact(['operasional','no','on']));
    }

    public function save (Request $request)
    {
        // $request->validate([
        //     'labaStlPjk' => 'required|numeric',
        //     'jmlEkuitas' => 'required|numeric',
        //     'biayaOps' => 'required|numeric',
        //     'PndptnOps' => 'required|numeric',
        //     'kaStrkas' => 'required|numeric',
        //     'HutangLancar' => 'required|numeric',
        //     'JmlPnrmRekAir' => 'required|numeric',
        //     'jmlRekAir' => 'required|numeric',
        //     'TotalAktiva' => 'required|numeric',
        //     'TotalHutang' => 'required|numeric',
        //     'date'=>'required|date'
        // ]);


        // Menyimpan data ke database (sesuaikan dengan model dan tabel Anda)
        $data = [
            'VolProdRil' => $request->input('VolProdRil'),
            'KpstsTrpsng' => $request->input('KpstsTrpsng'),
            'KalkulasiJumAir' => $request->input('KalkulasiJumAir'),
            'JmlAirDist' => $request->input('JmlAirDist'),
            'JmlWktPly' => $request->input('JmlWktPly'),
            'Plgnlayan' => $request->input('Plgnlayan'),
            'PlgnAktiv' => $request->input('PlgnAktiv'),
            'MtrAirGnti' => $request->input('MtrAirGnti'),
            'bulanTahun' => $request->input('date')
        ];

        Operasional::create($data);

        //return redirect()->back()->with('success', 'Data bulan dan tahun berhasil disimpan!');

            
    }

     public function edit (Request $request)
     {
        
        // $request->validate([
        //     'labaStlPjk' => 'required|numeric',
        //     'jmlEkuitas' => 'required|numeric',
        //     'biayaOps' => 'required|numeric',
        //     'PndptnOps' => 'required|numeric',
        //     'kaStrkas' => 'required|numeric',
        //     'HutangLancar' => 'required|numeric',
        //     'JmlPnrmRekAir' => 'required|numeric',
        //     'jmlRekAir' => 'required|numeric',
        //     'TotalAktiva' => 'required|numeric',
        //     'TotalHutang' => 'required|numeric',
        //     'date'=>'required|date'
        // ]);
        $operasional = Operasional::findOrFail($request->input('idOps'));

        // Menyimpan data ke database (sesuaikan dengan model dan tabel Anda)
        $operasional->update([
            'VolProdRil' => $request->input('VolProdRil'),
            'KpstsTrpsng' => $request->input('KpstsTrpsng'),
            'KalkulasiJumAir' => $request->input('KalkulasiJumAir'),
            'JmlAirDist' => $request->input('JmlAirDist'),
            'JmlWktPly' => $request->input('JmlWktPly'),
            'Plgnlayan' => $request->input('Plgnlayan'),
            'PlgnAktiv' => $request->input('PlgnAktiv'),
            'MtrAirGnti' => $request->input('MtrAirGnti'),
            'bulanTahun' => $request->input('date')
        ]);

        return redirect('/aOperasional')->with('success', 'Data bulan dan tahun berhasil disimpan!');
     }

     function del ($id) 
     {
         // Mencari data keuangan berdasarkan ID
         $operasional = Operasional::findOrFail($id);
         
         // Menghapus data keuangan
         $operasional->delete();
 
         // Redirect ke halaman sebelumnya dengan pesan sukses
         return redirect()->back()->with('success', 'Data Operasioanl berhasil dihapus!');
     }

    function dataOpBy ($id)
    {
        $operasional = Operasional::where('id',$id)->get();
        return response()->json(['data' => $operasional]);
    }

    function nrw ()
    {
    
    $terDistirbusi = Operasional::sum('terDistirbusi');
    $airterjual = Operasional::sum('airTerjual');
    
    return response()->json([
            'terDistribusi' => $terDistirbusi,
            'airterjual' => (int)$airterjual,
        ]);
    
    }

    public function chartNrw()
{
    
    $dataTerDistribusi = Operasional::pluck('terDistirbusi')->toArray();
    $dataAirTerjual = Operasional::pluck('airTerjual')->toArray();

    $dataNrw = [];

    
    foreach ($dataTerDistribusi as $key => $terDistribusi) {
        $airTerjual = $dataAirTerjual[$key] ?? 0;

        
        if ($terDistribusi > 0) {
            $hitungNrw = (($terDistribusi - $airTerjual) / $terDistribusi) * 100;
        } else {
            $hitungNrw = 0; 
        }

        $dataNrw[] = round($hitungNrw, 2);
    }

    
    return response()->json($dataNrw);


    
}

}
