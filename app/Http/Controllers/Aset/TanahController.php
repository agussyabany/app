<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\NilaiAktiva;
use App\Models\Aset\Pdf;
use App\Models\Aset\Tanah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TanahController extends Controller
{
    public function save(Request $request)
    {
        $user = Auth::user()->id;
        $lokasi = $request->input('lokasi');
        $nilai = $request->input('kode_aktiva');
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
        $ket = $request->input('ket');
        //$dok = $request->input('dok');

        $tanah = new  Tanah();
        $tanah->id_lokasi = $lokasi;
        $tanah->id_barang = $nama;
        $tanah->guna = $guna;
        $tanah->tahun = $tahun;
        $tanah->no_tunjuk = $no_tunjuk;
        $tanah->tgl_tunjuk= $tgl_tunjuk;
        $tanah->luas_tunjuk= $luas_tunjuk;
        $tanah->sertifikat = $sertifikat;
        $tanah->tgl_sertifikat = $tgl_sertifikat;
        $tanah->luas_sertifikat = $luas_sertifikat;
        $tanah->no_gambar = $no_gambar;
        $tanah->tgl_gambar = $tgl_gambar;
        $tanah->luas_gambar = $luas_gambar;
        $tanah->hak = $hak;
        $tanah->asal = $asal;
        $tanah->pemilik = $pemilik;
        $tanah->nilai = $nilai;
        $tanah->ket = $ket;
        $tanah->user = $user;
        $tanah->save();
    // Handle file uploads for dokumen
    $dok = $request->file('dok'); // Expecting 'dok' to be an array of files

    if ($request->hasFile('dok') && is_array($dok)) {
        foreach ($dok as $file) {
            if ($file->isValid()) {
                
                $destinationPath = public_path('assets/img/lokasi');
                $fileName = time() . '_' . uniqid() . '.pdf';
                $file->move($destinationPath, $fileName);

                // Create a new Dokumen entry
                Pdf::create([
                    'id_tanah' => $tanah->id,
                    'dok' => $fileName,
                    'gol'=>1
                ]);
            }
        }
        Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
        return redirect('/tanah');
        //return response()->json(['message' => 'Data inserted successfully']);
        }
        else {
            return response()->json(['message' => 'No valid documents uploaded'], 400);
        }
    }

    public function detail($id)
    {
        $tanah = Tanah::select('tanahs.id as id_tanah','id_lokasi','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','asal','tahun','no_tunjuk','tgl_tunjuk','luas_tunjuk','sertifikat','tgl_sertifikat','luas_sertifikat','no_gambar','tgl_gambar','luas_gambar','hak','asal','pemilik','nilai','nilai_now','ket','kode_barang')
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


    public function nilaitanah($id)
    {
        $tanah = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',1)
                ->get();
        return response()->json([
            'data' => $tanah
          ]);
    }
    public function nilaiSum($lok)
    {
        $tanah = NilaiAktiva::where('id_lokasi', $lok)
                ->where('cat',1)
                ->sum('nilai');
        return response()->json([
            'data' => $tanah
          ]);
    }

    public function vTanah()
    {
        $v_tanah = NilaiAktiva::select('no_voucher')
                ->distinct()
                ->where('cat', 1)
                ->get();
        return response()->json(['data' => $v_tanah]);
    }
}
