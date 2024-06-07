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
        $on = 1;
        $no = 1;
        $barang = Barang::all();
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.dashboard',compact(['barang','no','jabat','divisi','no','on']));
    }


    public function barangs()

    {
        $on = 1;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $barang = Barang::all();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.barang',compact(['jabat','divisi','barang','no','on']));
    }

    public function depts()

    {
        $on = 2;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $dept = Departemen::all();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.dept',compact(['jabat','divisi','dept','no','on']));
    }

    public function divs()

    {
        $on = 3;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $div = Divisi::select('divisis.id as idDiv','kode_div','nama_div','kode_dep',)->join('departemens','divisis.id_dep','=','departemens.id')->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        $dep = Departemen::all();
        return view('admin.pages.aset.master.div',compact(['jabat','divisi','div','no','on','dep']));
        //return $dep;
    }

    public function ruangs()

    {
        $on = 4;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $ruang = Ruangan::all();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.ruang',compact(['jabat','divisi','ruang','no','on']));
    }

    public function sumber()

    {
        $on = 5;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')

                    ->where('users.id',$idUSer)
                    ->first();
        $sdm = sdm::select('sdms.id as idSdm','nama_sdm','nip','nama_div','jabat')
                        ->join('divisis','sdms.id_div','=','divisis.id')
                        ->join('jabatans','sdms.id_jabat','=','jabatans.id')
                        ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        $div = Divisi::all();
        return view('admin.pages.aset.master.sdm',compact(['jabat','divisi','sdm','no','on','div']));
    }

    public function lokasis()

    {
        $on= 6;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $lokasi = lokasi::select('lokasi','alamat','aset_wilayah.wilayah as wilayah','lat','long','img')->join('aset_wilayah','lokasis.wilayah','=','aset_wilayah.id')->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.lokasi',compact(['jabat','divisi','lokasi','no','on']));
    }

    public function bahans()
    {
        $on = 8;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $bahan = bahan::all();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.bahan',compact(['jabat','divisi','bahan','no','on']));
    }

    public function aktivas()
    {
        $on = 9;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $aktiva = aktiva::all();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.aktiva',compact(['jabat','divisi','aktiva','no','on']));
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

    public function divDep($id)
    {
        $div = Divisi::where('id_dep',$id)->orderBy('id','DESC')->get();
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
        $on = 17;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $nilai = NilaiAktiva::select('nilai_aktivas.id as id_nilai','aktivas.id as as id_aktiva','no_voucher','tgl_voucher','aktiva','tahun','nilai','urai','kib','kode')
                                ->join('lokasis','nilai_aktivas.id_lokasi','lokasis.id')
                                ->join('aktivas','nilai_aktivas.id_aktiva','aktivas.id')
                                ->orderBy('nilai_aktivas.id','DESC')->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.nilai',compact(['jabat','divisi','nilai','no','on']));
    }

    public function tanah()
    {
        $on = 10;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();

        $tanah = Tanah::select('tanahs.id as id_tanah','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','tanahs.id_lokasi as idLok')
                        ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
                        // ->join('nilai_aktivas','tanahs.id_lokasi','=','nilai_aktivas.id_lokasi')
                        ->join('barangs','tanahs.id_barang','=','barangs.id')
                        // ->where('nilai_aktivas.cat',1)
                        ->orderBy('lokasis.lokasi', 'ASC')
                        // ->groupBy('tanahs.id', 'lokasi', 'nama_barang', 'guna', 'alamat', 'no_tunjuk', 'tgl_tunjuk', 'img', 'tanahs.id_lokasi','id_aktiva')
                        ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.tanah',compact(['jabat','divisi','tanah','no','on']));
    }

    public function mesin()
    {
        $on = 11;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $mesin = Mesin::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                    ->distinct('id_lokasi')
                    ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                    ->get();

        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.mesin',compact(['jabat','divisi','mesin','no','on']));
    }

    public function gedung()
    {
        $on = 12;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $gedung = Gedung::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                    ->distinct('id_lokasi')
                    ->join('lokasis','gedungs.id_lokasi','=','lokasis.id')
                    ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.gedung',compact(['jabat','divisi','gedung','no','on']));
    }

    public function kir()
    {
        $on = 16;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $kir = Kir::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                        ->distinct('id_lokasi')
                        ->join('lokasis','kirs.id_lokasi','=','lokasis.id')
                        ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.kir',compact(['jabat','divisi','kir','no','on']));
    }

}
