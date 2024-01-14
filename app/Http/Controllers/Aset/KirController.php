<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\Kir;
use App\Models\Aset\lokasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Div;

class KirController extends Controller
{
    public function dep($id)
    {
        $kir = Kir::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kirs.id_departemen','=','departemens.id')
                        ->join('lokasis','kirs.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

    public function div($dep,$lok)
    {
        $kir = Kir::select('nama_div','id_div','id_departemen')
                        ->join('divisis','kirs.id_div','=','divisis.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

    public function gedung($lok,$dep,$div)
    {
        $gedung_full = Kir::select('gedung')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->distinct('gedung')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function ruang($lok,$dep,$div,$ged)
    {
        $gedung_full = Kir::select('ruangan')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->where('gedung',$ged)
                            ->distinct('ruangan')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function detail($lok,$dep,$div,$ged,$ruang)
    {
        $ruang_detail = Kir::join('barangs','kirs.id_barang','=','barangs.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->where('gedung',$ged)
                            ->where('ruangan',$ruang)
                            ->get();
        return response()->json([
            'data' => $ruang_detail
          ]);
    }

    public function opsi()
    {
        $gedung_full = Kir::select('gedung')
                            ->distinct('gedung')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function save(Request $request)
    {
        $rules = [
            'lokasi' => 'required',
            'dep' => 'required',
            'div' => 'required',
            'gedung' => 'required',
            'ruang_kir' => 'required',
            'nama_aset' => 'required',
            'kode_aset' => 'required',
            'merk' => 'required',
            'bahan' => 'required',
            'jumlah' => 'required|numeric',
            'baik' => 'required|numeric',
            'ringan' => 'required|numeric',
            'berat' => 'required|numeric',
            'ket' => 'required',

        ];

        // Custom error messages
        $messages = [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute must be a number.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: jpeg, png, jpg, gif.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // If validation fails, return the errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $maxId = Kir::maxId();
        $id = $maxId + 1;
        $now = Carbon::now();
        $user = Auth::user()->id;
        $lokasi = $request->input('lokasi');
        $dep = $request->input('dep');
        $div = $request->input('div');
        $gedung = $request->input('gedung');
        $ruang = $request->input('ruang_kir');
        $nama_aset = $request->input('nama_aset');
        $kode_aset = $request->input('kode_aset');
        $merk = $request->input('merk');
        $bahan = $request->input('bahan');
        $jumlah = $request->input('jumlah');
        $baik = $request->input('baik');
        $ringan = $request->input('ringan');
        $berat = $request->input('berat');
        $ket = $request->input('ket');
        $img = $request->input('img');

        $imageData = base64_decode($img);


        $imageName = time() . '_' . uniqid() . '.jpg';
        file_put_contents(public_path('assets/img/kir/' . $imageName), $imageData);

        // Save other form data to the database
        $kir= new Kir();
        $kir->id = $id;
        $kir->id_barang = $nama_aset;
        $kir->id_departemen = $dep;
        $kir->id_div = $div;
        $kir->id_lokasi = $lokasi;
        $kir->gedung = $gedung;
        $kir->ruangan = $ruang;
        $kir->merk = $merk;
        $kir->bahan = $bahan;
        $kir->jumlah = $jumlah;
        $kir->baik = $baik;
        $kir->ringan = $ringan;
        $kir->berat = $berat;
        $kir->ket = $ket;
        $kir->id_user = $user;
        $kir->created_at = $now;
        $kir->img = $imageName;
        $kir->input = 0;

        $kir->save();
        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function input()
    {
        $kir = Kir::select('lokasi','nama_div','gedung','ruangan','nama_barang','merk')
                        ->join('barangs','kirs.id_barang','barangs.id')
                        ->join('divisis','kirs.id_div','divisis.id')
                        ->join('lokasis','kirs.id_lokasi','=','lokasis.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $kir
          ]);
    }

    public function clear()
    {
        Kir::where('input',0)
        ->update(['input' => 1]);
        return response()->json(['message' => 'Data updated successfully']);
    }

    public function print($lok,$dep,$div,$ged,$ruang)
    {
                        $kir = Kir::join('barangs','kirs.id_barang','=','barangs.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->where('id_div',$div)
                        ->where('gedung',$ged)
                        ->where('ruangan',$ruang)
                        ->get();
                        $i = 0;
                        $dept = Departemen::select('kode_dep')->where('id',$dep)->first();
                        $divi = Divisi::select('nama_div','kode_div')->where('id',$div)->first();
                        $loks = lokasi::select('lokasi')->where('id',$lok)->first();
                        $lokasi = $loks['lokasi'];
                        $divisi = $divi['nama_div'];
                        $struktur = $divi['kode_div'];
                        $departemen = $dept['kode_dep'];
                        $date = Carbon::now();
                        $tglIndo = $date->locale('id_ID')->format('d F Y');
                        $nama = Auth::user()->name;
                        $nip = Auth::user()->nip;
                        return view('admin.pages.aset.print.printKir',compact(['kir','i','lokasi','departemen','divisi','nama','tglIndo','struktur','ged','ruang','nip']));
    }
}
