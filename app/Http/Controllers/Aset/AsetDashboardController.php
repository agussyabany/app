<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aktiva;
use App\Models\Aset\Bahan;
use App\Models\Aset\Barang;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\Gedung;
use App\Models\Aset\Kir;
use App\Models\Aset\lokasi;
use App\Models\Aset\Mesin;
use App\Models\Aset\NilaiAktiva;
use App\Models\Aset\Ruangan;
use App\Models\Aset\Sdm;
use App\Models\Aset\Tanah;
use Illuminate\Http\Request;

class AsetDashboardController extends Controller
{
    public function index()

    {
        $no = 1;
        $barang = Barang::all();
        return view('admin.pages.aset.dashboard',compact(['barang','no']));
    }

    public function barang()
    {
        $barang = Barang::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $barang
          ]);
    }

    public function departemen()
    {
        $dep = Departemen::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $dep
          ]);
    }

    public function divisi()
    {
        $div = Divisi::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $div
          ]);
    }

    public function ruang()
    {
        $ruang = Ruangan::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $ruang
          ]);
    }

    public function sdm()
    {
        $sdm = Sdm::select('jabat','nama_sdm','nip','id_jabat','id_div','nama_div')
                ->join('jabatans','sdms.id_jabat','=','jabatans.id')
                ->join('divisis','sdms.id_div','=','divisis.id')
                ->get();
        return response()->json([
            'data' => $sdm
          ]);
    }

    public function lokasi()
    {
        $lok = lokasi::orderBy('id','ASC')->get();
        return response()->json([
            'data' => $lok
          ]);
    }
    public function bahan()
    {
        $bahan = Bahan::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $bahan
          ]);
    }

    public function aktiva()
    {
        $aktiva = Aktiva::orderBy('id','DESC')->get();
        return response()->json([
            'data' => $aktiva
          ]);
    }

    public function nilai()
    {
        $nilai = NilaiAktiva::select('nilai_aktivas.id as id_nilai','aktivas.id as as id_aktiva','no_voucher','tgl_voucher','aktiva','tahun','nilai','urai','kib','kode')
                                ->join('aktivas','nilai_aktivas.id_aktiva','aktivas.id')
                                ->orderBy('nilai_aktivas.id','DESC')->get();
        return response()->json([
            'data' => $nilai
          ]);
    }

    public function tanah()
    {
        $tanah = Tanah::select('tanahs.id as id_tanah','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img')
                        ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
                        ->join('barangs','tanahs.id_barang','=','barangs.id')
                        ->orderBy('tanahs.id','DESC')
                        ->get();
        return response()->json([
            'data' => $tanah
          ]);
    }

    public function mesin()
    {
        $mesin = Mesin::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                        ->distinct('id_lokasi')
                        ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function gedung()
    {
        $gedung = Gedung::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                        ->distinct('id_lokasi')
                        ->join('lokasis','gedungs.id_lokasi','=','lokasis.id')
                        ->get();
        return response()->json([
            'data' => $gedung
          ]);
    }

    public function kir()
    {
        $kir = Kir::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                        ->distinct('id_lokasi')
                        ->join('lokasis','kirs.id_lokasi','=','lokasis.id')
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

}
