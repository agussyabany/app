<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aktiva;
use App\Models\Aset\Bahan;
use App\Models\Aset\Barang;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\Gedung;
use App\Models\Aset\Golongan;
use App\Models\Aset\Indeks;
use App\Models\Aset\KibD;
use App\Models\Aset\KibE;
use App\Models\Aset\KibF;
use App\Models\Aset\Kir;
use App\Models\Aset\lokasi;
use App\Models\Aset\Mesin;
use App\Models\Aset\NilaiAktiva;
use App\Models\Aset\Ruangan;
use App\Models\Aset\Sdm;
use App\Models\Aset\Tanah;
use App\Models\Soc\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
                    $barang = Barang::leftJoin('golongans', function($join) {
                        $join->on(DB::raw('CAST(barangs.golongan AS bigint)'), '=', 'golongans.id');
                    })
                    ->select('barangs.id as barId', 'golongans.id as golID','nama_barang','kode_barang','golongan','golongans.nama as nama')
                    ->get();
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
                    $lokasi = Lokasi::select('lokasis.id as idLok', 'lokasi', 'alamat', 'aset_wilayah.wilayah as wilayah', 'lat', 'long', 'img')
                    ->join('aset_wilayah', 'lokasis.wilayah', '=', 'aset_wilayah.id')
                    ->orderBy('lokasis.lokasi', 'ASC')
                    ->get();
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

    public function nilaiView()
{
    $on = 17;
    $no = 1;
    $idUSer = Auth::user()->id;
    $user = User::join('divisis','users.divisi','=','divisis.id')
                ->join('jabatans','users.jabat','=','jabatans.id')
                ->where('users.id',$idUSer)
                ->first();

    $jabat = $user['jabat'];
    $divisi = $user['nama_div'];
    $tahunSekarang = date('Y');
    $tahunAwal = $tahunSekarang - 30;
    $tahunAkhir = $tahunSekarang + 10;
    $tahunRange = range($tahunAkhir, $tahunAwal);

    $aktiva = Aktiva::get();
    $dep = Departemen::get();
    $div  =Divisi::get();
    $lok = lokasi::get();
    $golongan = Golongan::get();
    return view('admin.pages.aset.kib.nilai', compact('jabat', 'divisi', 'on', 'no','tahunRange','aktiva','dep','div','lok','golongan'));
}

    public function nilaiData()
    {
        $sumNilai = NilaiAktiva::sum('nilai');
        $data = NilaiAktiva::query()
        ->join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')
        ->select([
            'nilai_aktivas.id as idNilai',
            'nilai_aktivas.no_voucher',
            'nilai_aktivas.tgl_voucher',
            'aktivas.aktiva as nama_aktiva',
            'nilai_aktivas.tahun',
            'nilai_aktivas.nilai',
            'nilai_aktivas.urai',
            'aktivas.kib',
            'aktivas.kode'
        ])
        ->orderByDesc('nilai_aktivas.id');

    return DataTables::of($data)
        ->addIndexColumn()

        ->editColumn('nilai', function ($row) {
            return number_format($row->nilai, 0, ',', '.');
        })

        ->addColumn('aksi', function ($row) {
            return '<div class="btn-group">
                            <button class="btn btn-default border border-primary btn-sm detail" data-id="'.$row->idNilai.'" type="button"></button>
                            <button type="button" class="btn btn-sm btn-default border border-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item editNilai" data-id="'.$row->idNilai.'" href="#">
                                        <i class="fa-solid fa-edit"></i>&nbsp;EDIT
                                    </a>
                                </li>
                                <li>
                                    <form action="'.url('nilai.hapus/' . $row->idNilai).'" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')" style="display:inline;">
                                        '.csrf_field().method_field('POST   ').'
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa-solid fa-trash"></i>&nbsp;DELETE
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>';

        })

        ->rawColumns(['aksi'])
        ->with(['sumNilai' => number_format($sumNilai, 0, ',', '.')])
        ->make(true);
        }


    public function arsip()
    {
        $on = 7;
        $no = 1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $arsip = Indeks::select('gedung')->distinct()->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.master.arsip',compact(['jabat','divisi','arsip','no','on']));
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

        // $tanah = Tanah::select('tanahs.id as id_tanah','lokasi','nama_barang','guna','alamat','no_tunjuk','tgl_tunjuk','img','tanahs.id_lokasi as idLok')
        //                 ->join('lokasis','tanahs.id_lokasi','=','lokasis.id')
        //                 ->join('barangs','tanahs.id_barang','=','barangs.id')
        //                 ->orderBy('lokasis.lokasi', 'ASC')
        //                 ->distinct('idLok')
        //                 ->get();
        $tanah = Tanah::select(
            DB::raw('MIN(tanahs.id) as id_tanah'),
            'lokasis.lokasi',
            DB::raw('MIN(barangs.nama_barang) as nama_barang'),
            DB::raw('MIN(tanahs.guna) as guna'),
            DB::raw('MIN(lokasis.alamat) as alamat'),
            DB::raw('MIN(tanahs.no_tunjuk) as no_tunjuk'),
            DB::raw('MIN(tanahs.tgl_tunjuk) as tgl_tunjuk'),
            DB::raw('MIN(lokasis.img) as img'),
            'tanahs.id_lokasi as idLok'
        )
        ->join('lokasis', 'tanahs.id_lokasi', '=', 'lokasis.id')
        ->join('barangs', 'tanahs.id_barang', '=', 'barangs.id')
        ->groupBy('tanahs.id_lokasi', 'lokasis.lokasi')
        ->orderBy('lokasis.lokasi', 'ASC')
        ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];

        $totalTanah = NilaiAktiva::join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')->where('kib', 'TANAH')->sum('nilai');
        $notif = NilaiAktiva::where('stat',0)->where('cat',1)->count();
        $baru = NilaiAktiva::select('nilai_aktivas.id as idAk','lokasis.id as idLok','lokasis.lokasi as lok','departemens.id as idDep','departemens.kode_dep as dep','divisis.id as idDiv','divisis.nama_div as namDiv','urai','nilai_aktivas.cat')
                            ->join('lokasis','nilai_aktivas.id_lokasi','=','lokasis.id')
                            ->join('departemens','nilai_aktivas.dep','=','departemens.id')
                            ->join('divisis','nilai_aktivas.div','=','divisis.id')
                            ->where('stat',0)
                            ->where('nilai_aktivas.cat',1)
                            ->get();
        return view('admin.pages.aset.kib.tanah',compact(['jabat','divisi','tanah','no','on','totalTanah','notif','baru']));
    }

    public function idTanah($id)
    {
        $idTanah = Tanah::select('tanahs.id as idT','id_lokasi','lokasi','guna','pemilik','luas_sertifikat')->join('lokasis', 'tanahs.id_lokasi', '=', 'lokasis.id')->where('id_lokasi',$id)->get();
         return response()->json([
            'data' => $idTanah
          ]);
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
                     ->where('input',1)
                    ->get();

        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        $totalMesin = NilaiAktiva::join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')->where('kib','KIB B - PERALATAN DAN MESIN')->sum('nilai');
        $notif = NilaiAktiva::where('stat',0)->where('cat',2)->count();
        $baru = NilaiAktiva::select('nilai_aktivas.id as idAk','lokasis.id as idLok','lokasis.lokasi as lok','departemens.id as idDep','departemens.kode_dep as dep','divisis.id as idDiv','divisis.nama_div as namDiv','urai','nilai_aktivas.cat')
                            ->join('lokasis','nilai_aktivas.id_lokasi','=','lokasis.id')
                            ->join('departemens','nilai_aktivas.dep','=','departemens.id')
                            ->join('divisis','nilai_aktivas.div','=','divisis.id')
                            ->where('stat',0)
                            ->where('nilai_aktivas.cat',2)
                            ->get();
        return view('admin.pages.aset.kib.mesin',compact(['jabat','divisi','mesin','no','on','totalMesin','baru','notif']));
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
        $totalGedung = NilaiAktiva::join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')->where('kib', 'KIB C - GEDUNG DAN BANGUNAN')->sum('nilai');
        $notif = NilaiAktiva::where('stat',0)->where('cat',3)->count();
        $baru = NilaiAktiva::select('nilai_aktivas.id as idAk','lokasis.id as idLok','lokasis.lokasi as lok','departemens.id as idDep','departemens.kode_dep as dep','divisis.id as idDiv','divisis.nama_div as namDiv','urai','nilai_aktivas.cat')
                            ->join('lokasis','nilai_aktivas.id_lokasi','=','lokasis.id')
                            ->join('departemens','nilai_aktivas.dep','=','departemens.id')
                            ->join('divisis','nilai_aktivas.div','=','divisis.id')
                            ->where('stat',0)
                            ->where('nilai_aktivas.cat',3)
                            ->get();
        return view('admin.pages.aset.kib.gedung',compact(['jabat','divisi','gedung','no','on','totalGedung','notif','baru']));
    }

    public function kibD()
    {
        $on = 13;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $kibD = KibD::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                    ->distinct('id_lokasi')
                    ->join('lokasis','kib_d_s.id_lokasi','=','lokasis.id')
                    ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        $notif = NilaiAktiva::where('stat',0)->where('cat',4)->count();
        $baru = NilaiAktiva::select('nilai_aktivas.id as idAk','lokasis.id as idLok','lokasis.lokasi as lok','departemens.id as idDep','departemens.kode_dep as dep','divisis.id as idDiv','divisis.nama_div as namDiv','urai','nilai_aktivas.cat')
                            ->join('lokasis','nilai_aktivas.id_lokasi','=','lokasis.id')
                            ->join('departemens','nilai_aktivas.dep','=','departemens.id')
                            ->join('divisis','nilai_aktivas.div','=','divisis.id')
                            ->where('stat',0)
                            ->where('nilai_aktivas.cat',4)
                            ->get();
        return view('admin.pages.aset.kib.kibD',compact(['jabat','divisi','kibD','no','on','notif','baru']));
    }

    public function kibE()
    {
        $on = 14;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $kibE = KibE::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok')
                    ->distinct('id_lokasi')
                    ->join('lokasis','kib_e_s.id_lokasi','=','lokasis.id')
                    ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.kibE',compact(['jabat','divisi','kibE','no','on']));
    }

    public function kibF()
    {
        $on = 15;
        $no=1;
        $idUSer = Auth::user()->id;
        $user = User::join('divisis','users.divisi','=','divisis.id')
                    ->join('jabatans','users.jabat','=','jabatans.id')
                    ->where('users.id',$idUSer)
                    ->first();
        $kibF = KibF::select('id_lokasi','lokasi','alamat','lokasis.img as img_lok','nilai')
                    ->distinct('id_lokasi')
                    ->join('lokasis','kib_f_s.id_lokasi','=','lokasis.id')
                    ->get();
        $jabat = $user['jabat'];
        $divisi = $user['nama_div'];
        return view('admin.pages.aset.kib.kibF',compact(['jabat','divisi','kibF','no','on']));
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
        $notif = NilaiAktiva::where('stat',0)->where('cat',4)->count();
        $baru = NilaiAktiva::select('nilai_aktivas.id as idAk','lokasis.id as idLok','lokasis.lokasi as lok','departemens.id as idDep','departemens.kode_dep as dep','divisis.id as idDiv','divisis.nama_div as namDiv','urai','nilai_aktivas.cat')
                            ->join('lokasis','nilai_aktivas.id_lokasi','=','lokasis.id')
                            ->join('departemens','nilai_aktivas.dep','=','departemens.id')
                            ->join('divisis','nilai_aktivas.div','=','divisis.id')
                            ->where('stat',0)
                            ->where('nilai_aktivas.cat',4)
                            ->get();
        return view('admin.pages.aset.kib.kir',compact(['jabat','divisi','kir','no','on']));
    }

    

}
