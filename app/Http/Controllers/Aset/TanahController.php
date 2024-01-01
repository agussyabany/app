<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Tanah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TanahController extends Controller
{
    public function save(Request $request)
    {
        $lokasi = $request->input('lokasi');
        $kode = $request->input('kode');
        $tahun = $request->input('tahun');
        $nama = $request->input('nama');
        $guna = $request->input('guna');
        $no_tunjuk = $request->input('no_tunjuk');
        $tgl_tunjuk = $request->input('tgl_tunjuk');
        $luas_tunjuk = $request->input('luas_tunjuk');
        $sertifikat = $request->input('sertifikat');
        $tgl_sertifikat = $request->input('tgl_sertifikat');
        $luas_sertifikat = $request->input('luas_sertifikat');
        $no_gambar = $request->input('no_gambar');
        $tgl_gambar = $request->input('tgl_gambar');
        $luas_gambar = $request->input('luas_gambar');
        $hak = $request->input('hak');
        $asal = $request->input('asal');
        $pemilik = $request->input('pemilik');
        $nilai_a = $request->input('nilai_a');
        $nilai_now = $request->input('nilai_now');
        $ket = $request->input('ket');
        $dok = $request->input('dok');


        // $imageData = base64_decode($dok);


        // $imageName = time() . '_' . uniqid() . '.pdf';
        // file_put_contents(public_path('assets/img/lokasi/' . $imageName), $imageData);

        
        // $lokasi = new lokasi();
        // $lokasi->lokasi = $nama_lokasi;
        // $lokasi->alamat = $alamat;
        // $lokasi->lat = $lat;
        // $lokasi->long = $long;
        // $lokasi->img = $imageName;
        // $lokasi->save();


        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function detail($id)
    {
        $tanah = Tanah::select('tanahs.id as id_tanah','id_lokasi','id_lokasi','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','asal','tahun','no_tunjuk','tgl_tunjuk','luas_tunjuk','sertifikat','tgl_sertifikat','luas_sertifikat','no_gambar','tgl_gambar','luas_gambar','hak','asal','pemilik','nilai','nilai_now','ket','kode_barang')
                        ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
                        ->join('barangs','tanahs.id_barang','=','barangs.id')
                        ->where('tanahs.id',$id)
                        ->orderBy('tanahs.id','DESC')
                        ->get();
        return response()->json([
            'data' => $tanah
          ]);
    }

    public function print()
    {
        $tanah = Tanah::select('tanahs.id as id_tanah','id_lokasi','id_lokasi','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','asal','tahun','no_tunjuk','tgl_tunjuk','luas_tunjuk','sertifikat','tgl_sertifikat','luas_sertifikat','no_gambar','tgl_gambar','luas_gambar','hak','asal','pemilik','nilai','nilai_now','ket','kode_barang')
        ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
        ->join('barangs','tanahs.id_barang','=','barangs.id')
        ->orderBy('tanahs.id','DESC')
        ->get();
        $total_luasTunjuk = Tanah::sum(DB::raw('CAST(luas_tunjuk AS integer)'));
        $total_luasSrtfkt = Tanah::sum(DB::raw('CAST(luas_sertifikat AS integer)'));
        $total_luasGambar = Tanah::sum(DB::raw('CAST(luas_gambar AS integer)'));
        $total_nilai = Tanah::sum('nilai');
        $i = 1;
        $date = Carbon::now();
        $tglIndo = $date->locale('id_ID')->format('d F Y');
        $nama = Auth::user()->name;
        $nip = Auth::user()->nip;
        return view('admin.pages.aset.print.printTanah',compact(['tanah','i','total_luasTunjuk','total_luasSrtfkt','total_luasGambar','total_nilai','tglIndo','nama','nip']));
    }
}
