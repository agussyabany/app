<?php

namespace App\Http\Controllers\LiveLine\AdminKinerja;

use App\Http\Controllers\Controller;
use App\Models\liveline\kinerja\Pelayanan;
use Illuminate\Http\Request;

class AdmPelController extends Controller
{
    public function data ()
    {
        $on = 14;
        $no = 1;
        $pelayanan = Pelayanan::all();

        return view('Liveline.pages.adminKinerja.aPelayanan',compact(['pelayanan','no','on']));
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
            'JmlPnddkTrlyni' => $request->input('JmlPnddkTrlyni'),
            'jmlPndkWil' => $request->input('jmlPndkWil'),
            'kalKulasiJmlPlgn' => $request->input('kalKulasiJmlPlgn'),
            'JmlPlgnThLl' => $request->input('JmlPlgnThLl'),
            'AduanSlsai' => $request->input('AduanSlsai'),
            'JmlAduan' => $request->input('JmlAduan'),
            'UjiKualitas' => $request->input('UjiKualitas'),
            'titikUji' => $request->input('titikUji'),
            'JmlAirTrjualDom' => $request->input('JmlAirTrjualDom'),
            'JmlPlgnDom' => $request->input('JmlPlgnDom'),
            'bulanTahun' => $request->input('date')
        ];

        Pelayanan::create($data);

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

        $pelayanan = Pelayanan::findOrFail($request->input('idPel'));
        // Menyimpan data ke database (sesuaikan dengan model dan tabel Anda)
        $pelayanan->update([
            'JmlPnddkTrlyni' => $request->input('JmlPnddkTrlyni'),
            'jmlPndkWil' => $request->input('jmlPndkWil'),
            'kalKulasiJmlPlgn' => $request->input('kalKulasiJmlPlgn'),
            'JmlPlgnThLl' => $request->input('JmlPlgnThLl'),
            'AduanSlsai' => $request->input('AduanSlsai'),
            'JmlAduan' => $request->input('JmlAduan'),
            'UjiKualitas' => $request->input('UjiKualitas'),
            'titikUji' => $request->input('titikUji'),
            'JmlAirTrjualDom' => $request->input('JmlAirTrjualDom'),
            'JmlPlgnDom' => $request->input('JmlPlgnDom'),
            'bulanTahun' => $request->input('date')
        ]);
        return redirect('/aPelayanan')->with('success', 'Data bulan dan tahun berhasil disimpan!');

            
    }

    function del ($id) 
     {
         // Mencari data keuangan berdasarkan ID
         $pelayanan = Pelayanan::findOrFail($id);
         
         // Menghapus data keuangan
         $pelayanan->delete();
 
         // Redirect ke halaman sebelumnya dengan pesan sukses
         return redirect()->back()->with('success', 'Data Pelayanan berhasil dihapus!');
     }

    function dataOpBy ($id)
    {
        $pelayanan = Pelayanan::where('id',$id)->get();
        return response()->json(['data' => $pelayanan]);
    }


    function cakupan ()
    {
    
        $JmlPnddkTrlyni = Pelayanan::orderBy('id', 'DESC')->value('JmlPnddkTrlyni');
        $jmlPndkWil = Pelayanan::orderBy('id', 'DESC')->value('jmlPndkWil');
    
    return response()->json([
            'JmlPnddkTrlyni' => $JmlPnddkTrlyni,
            'jmlPndkWil' => $jmlPndkWil,
        ]);
    
    }
}
