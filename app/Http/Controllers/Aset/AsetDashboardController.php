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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AsetDashboardController extends Controller
{
    public function index()

    {
        $no = 1;
        $barang = Barang::all();
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.dashboard',compact(['barang','no','jabat','divisi']));
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
                                ->join('lokasis','nilai_aktivas.id_lokasi','lokasis.id')
                                ->join('aktivas','nilai_aktivas.id_aktiva','aktivas.id')
                                ->orderBy('nilai_aktivas.id','DESC')->get();
        return response()->json([
            'data' => $nilai
          ]);
    }

    public function tanah()
    {
        $tanah = Tanah::select('tanahs.id as id_tanah','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','tanahs.id_lokasi as idLok')
                        ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
                        // ->join('nilai_aktivas','tanahs.id_lokasi','=','nilai_aktivas.id_lokasi')
                        ->join('barangs','tanahs.id_barang','=','barangs.id')
                        // ->where('nilai_aktivas.cat',1)
                        ->orderBy('tanahs.id', 'DESC')
                        // ->groupBy('tanahs.id', 'lokasi', 'nama_barang', 'guna', 'alamat', 'no_tunjuk', 'tgl_tunjuk', 'img', 'tanahs.id_lokasi','id_aktiva')
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
