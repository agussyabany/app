<?php

namespace App\Http\Controllers\LiveLine\AdminKinerja;

use App\Http\Controllers\Controller;
use App\Models\liveline\kinerja\KinSdm;
use Illuminate\Http\Request;

class AdmSdmController extends Controller
{
    public function data ()
    {
        $on = 16;
        $no = 1;
        $sdm = KinSdm::all();

        return view('Liveline.pages.adminKinerja.aSdm',compact(['sdm','no','on']));
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
            'JmlPgwai' => $request->input('JmlPgwai'),
            'JmlPlgn1000' => $request->input('JmlPlgn1000'),
            'JmlPegDiklat' => $request->input('JmlPegDiklat'),
            'RealByDiklat' => $request->input('RealByDiklat'),
            'RealByPeg' => $request->input('RealByPeg'),
            
            'bulanTahun' => $request->input('date')
        ];

        KinSdm::create($data);

        return redirect()->back()->with('success', 'Data bulan dan tahun berhasil disimpan!');

            
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

        $sdm = KinSdm::findOrFail($request->input('idSdm'));
        // Menyimpan data ke database (sesuaikan dengan model dan tabel Anda)
        $sdm->update([
            'JmlPgwai' => $request->input('JmlPgwai'),
            'JmlPlgn1000' => $request->input('JmlPlgn1000'),
            'JmlPegDiklat' => $request->input('JmlPegDiklat'),
            'RealByDiklat' => $request->input('RealByDiklat'),
            'RealByPeg' => $request->input('RealByPeg'),
            
            'bulanTahun' => $request->input('date')
        ]);

        return redirect()->back()->with('success', 'Data bulan dan tahun berhasil disimpan!');

            
    }

    function del ($id) 
     {
         // Mencari data keuangan berdasarkan ID
         $sdm = KinSdm::findOrFail($id);
         
         // Menghapus data keuangan
         $sdm->delete();
 
         // Redirect ke halaman sebelumnya dengan pesan sukses
         return redirect()->back()->with('success', 'Data Pelayanan berhasil dihapus!');
     }

    function dataSdmBy ($id)
    {
        $sdm = KinSdm::where('id',$id)->get();
        return response()->json(['data' => $sdm]);
    }
}
