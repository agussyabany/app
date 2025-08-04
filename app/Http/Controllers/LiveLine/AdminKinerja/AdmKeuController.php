<?php

namespace App\Http\Controllers\LiveLine\AdminKinerja;

use App\Http\Controllers\Controller;
use App\Models\liveline\kinerja\Keuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdmKeuController extends Controller
{
    public function data ()
    {
        $on = 13;
        $no = 1;
        $keuangan = Keuangan::all();
        return view('Liveline.pages.adminKinerja.aKeuangan',compact(['keuangan','no','on']));
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
            'labaStlPjk' => $request->input('labaStlPjk'),
            'jmlEkuitas' => $request->input('jmlEkuitas'),
            'biayaOps' => $request->input('biayaOps'),
            'PndptnOps' => $request->input('PndptnOps'),
            'kaStrkas' => $request->input('kaStrkas'),
            'HutangLancar' => $request->input('HutangLancar'),
            'JmlPnrmRekAir' => $request->input('JmlPnrmRekAir'),
            'jmlRekAir' => $request->input('jmlRekAir'),
            'TotalAktiva' => $request->input('TotalAktiva'),
            'TotalHutang' => $request->input('TotalHutang'),
            'bulanTahun' => $request->input('date')
        ];

        Keuangan::create($data);

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


        // Mengambil data berdasarkan ID
    $keuangan = Keuangan::findOrFail($request->input('idKeu'));
    
    // Mengupdate data dengan input yang diterima
    $keuangan->update([
        'labaStlPjk' => $request->input('labaStlPjk'),
        'jmlEkuitas' => $request->input('jmlEkuitas'),
        'biayaOps' => $request->input('biayaOps'),
        'PndptnOps' => $request->input('PndptnOps'),
        'kaStrkas' => $request->input('kaStrkas'),
        'HutangLancar' => $request->input('HutangLancar'),
        'JmlPnrmRekAir' => $request->input('JmlPnrmRekAir'),
        'jmlRekAir' => $request->input('jmlRekAir'),
        'TotalAktiva' => $request->input('TotalAktiva'),
        'TotalHutang' => $request->input('TotalHutang'),
        'bulanTahun' => $request->input('date'),
    ]);

        return redirect('/aKeuangan')->with('success', 'Data bulan dan tahun berhasil disimpan!');

            
    }

    function del ($id) 
    {
        // Mencari data keuangan berdasarkan ID
        $keuangan = Keuangan::findOrFail($id);
        
        // Menghapus data keuangan
        $keuangan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data keuangan berhasil dihapus!');
    }

    function dataKeuBy ($id)
    {
        $keuangan = Keuangan::where('id',$id)->get();
        return response()->json(['data' => $keuangan]);
    }

    function laba ()
{
    $labaStlPjk = keuangan::sum('labaStlPjk');
    $jmlEkuitas = keuangan::select('jmlEkuitas')->orderBy('id','DESC')->first();

    return response()->json([
        'labaStlPjk' => (int)$labaStlPjk,
        'jmlEkuitas' => $jmlEkuitas->jmlEkuitas,
    ]);
}
}
