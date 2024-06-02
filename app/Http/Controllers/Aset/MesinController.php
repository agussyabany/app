<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\Mesin;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MesinController extends Controller
{
    public function dep($id)
    {
        $mesin = Mesin::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','mesins.id_departemen','=','departemens.id')
                        ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function div($dep,$lok)
    {
        $mesin = Mesin::select('nama_div','id_div','id_departemen')
                        ->join('divisis','mesins.id_div','=','divisis.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $mesin_full = Mesin::select('nama_barang','merk','guna','tahun','mesins.id as id_mesin','nama_div','img')
                            ->join('barangs','mesins.id_barang','barangs.id')
                            ->join('divisis','mesins.id_div','divisis.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $mesin_full
          ]);
    }

    public function detail($id)
    {
        $mesin_full = Mesin::where('mesins.id',$id)
                            ->join('barangs','mesins.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $mesin_full
          ]);
    }

    public function edit($id)
    {
        $mesin_full = Mesin::select('barangs.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','id_departemen','id_div','kode','reg','tahun','harga','susut','bahan','asal','ukuran','merk','pabrik','rangka','mesin','polisi','bpkb','ket','mesins.id as id_mesin','guna')
                            ->where('mesins.id',$id)
                            ->join('barangs','mesins.id_barang','barangs.id')
                            ->join('divisis','mesins.id_div','divisis.id')
                            ->join('departemens','mesins.id_departemen','=','departemens.id')
                            ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                            ->get();
        return response()->json([
            'data' => $mesin_full
          ]);
    }

    public function save(Request $request)
    {
        $rules = [
            'lokasi' => 'required',
            'dep' => 'required',
            'div' => 'required',
            'nama_aset' => 'required',
            'kode_aset' => 'required',
            'reg' => 'required',
            'jenis' => 'required',
            'tahun' => 'required|numeric',
            'batas' => 'required|numeric',

            'susut' => 'required|numeric',
            'bahan' => 'required',
            'guna' => 'required',
            'ukuran' => 'required',
            'merk' => 'required',
            'pabrik' => 'required',
            'rangka' => 'required',
            'mesin' => 'required',
            'nopol' => 'required',
            'bpkb' => 'required',
            'asal' => 'required',
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
        $maxId = Mesin::maxId();
        $id = $maxId + 1;
        $now = Carbon::now();
        $user = Auth::user()->id;
        $lokasi = $request->input('lokasi');
        $dep = $request->input('dep');
        $div = $request->input('div');
        $nama_aset = $request->input('nama_aset');
        $kode_aset = $request->input('kode_aset');
        $reg = $request->input('reg');
        $jenis = $request->input('jenis');
        $tahun = $request->input('tahun');
        $batas = $request->input('batas');
        $nilai = $request->input('nilai');
        $susut = $request->input('susut');
        $bahan = $request->input('bahan');
        $guna = $request->input('guna');
        $ukuran = $request->input('ukuran');
        $merk = $request->input('merk');
        $pabrik = $request->input('pabrik');
        $rangka = $request->input('rangka');
        $mesin = $request->input('mesin');
        $nopol = $request->input('nopol');
        $bpkb = $request->input('bpkb');
        $asal = $request->input('asal');
        $ket = $request->input('ket');
        $batas = $request->input('batas');
        $img = $request->input('img');

        $imageData = base64_decode($img);


        $imageName = time() . '_' . uniqid() . '.jpg';
        file_put_contents(public_path('assets/img/mesin/' . $imageName), $imageData);

        // Save other form data to the database
        $kib_b = new Mesin();
        $kib_b->id = $id;
        $kib_b->id_barang = $nama_aset;
        $kib_b->id_departemen = $dep;
        $kib_b->id_div = $div;
        $kib_b->id_lokasi = $lokasi;
        $kib_b->kode = $kode_aset;
        $kib_b->reg = $reg;
        $kib_b->tahun = $tahun;
        $kib_b->harga = $nilai;
        $kib_b->susut = $susut;
        $kib_b->ukuran = $ukuran;
        $kib_b->merk = $merk;
        $kib_b->pabrik = $pabrik;
        $kib_b->rangka = $rangka;
        $kib_b->mesin = $mesin;
        $kib_b->polisi = $nopol;
        $kib_b->bpkb = $bpkb;
        $kib_b->ket = $ket;
        $kib_b->guna = $guna;
        $kib_b->id_user = $user;
        $kib_b->created_at = $now;
        $kib_b->img = $imageName;
        $kib_b->input = 0;
        $kib_b->bahan = $bahan;
        $kib_b->asal = $asal;
        $kib_b->save();
        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function input()
    {
        $mesin = Mesin::select('lokasi','nama_div','nama_barang','merk')
                        ->join('barangs','mesins.id_barang','barangs.id')
                        ->join('divisis','mesins.id_div','divisis.id')
                        ->join('lokasis','mesins.id_lokasi','=','lokasis.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function clear()
    {
        Mesin::where('input',0)
        ->update(['input' => 1]);
        return response()->json(['message' => 'Data updated successfully']);
    }

    public function hapus($id)
    {
        Mesin::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }

    public function update(Request $request)
    {
        $rules = [
            'lokasi' => 'required',
            'dep' => 'required',
            'div' => 'required',
            'nama_aset' => 'required',
            'kode_aset' => 'required',
            'reg' => 'required',
            'jenis' => 'required',
            'tahun' => 'required|numeric',
            'batas' => 'required|numeric',
            'susut' => 'required|numeric',
            'bahan' => 'required',
            'guna' => 'required',
            'ukuran' => 'required',
            'merk' => 'required',
            'pabrik' => 'required',
            'rangka' => 'required',
            'mesin' => 'required',
            'nopol' => 'required',
            'bpkb' => 'required',
            'asal' => 'required',
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

        $user = Auth::user()->id;
        $id = $request->input('id');
        $lokasi = $request->input('lokasi');
        $dep = $request->input('dep');
        $div = $request->input('div');
        $nama_aset = $request->input('nama_aset');
        $kode_aset = $request->input('kode_aset');
        $reg = $request->input('reg');
        $jenis = $request->input('jenis');
        $tahun = $request->input('tahun');
        $batas = $request->input('batas');
        $nilai = $request->input('nilai');
        $susut = $request->input('susut');
        $bahan = $request->input('bahan');
        $guna = $request->input('guna');
        $ukuran = $request->input('ukuran');
        $merk = $request->input('merk');
        $pabrik = $request->input('pabrik');
        $rangka = $request->input('rangka');
        $mesin = $request->input('mesin');
        $nopol = $request->input('nopol');
        $bpkb = $request->input('bpkb');
        $asal = $request->input('asal');
        $ket = $request->input('ket');
        $batas = $request->input('batas');

        Mesin::where('id',$id)
        ->update(
            [
                'id_barang' => $nama_aset,
                'id_departemen' => $dep,
                'id_div' => $div,
                'id_lokasi' => $lokasi,
                'kode' => $kode_aset,
                'reg' => $reg,
                'tahun' => $tahun,
                'harga' => $nilai,
                'susut' => $susut,
                'ukuran' => $ukuran,
                'merk' => $merk,
                'pabrik' => $pabrik,
                'rangka' => $rangka,
                'mesin' => $mesin,
                'polisi' => $nopol,
                'bpkb' => $bpkb,
                'ket' => $ket,
                'guna' => $guna,
                'id_user' => $user,
                'bahan' => $bahan,
                'asal' => $asal,
            ]);
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function print($lok,$dep,$div)
    {
        $mesin = Mesin::select('nama_barang','merk','guna','tahun','mesins.id as id_mesin','nama_div','img','pabrik','rangka','polisi','bpkb','asal','kode','reg','harga')
                        ->join('barangs','mesins.id_barang','barangs.id')
                        ->join('divisis','mesins.id_div','divisis.id')
                        ->where('id_departemen',$dep)
                        ->where('id_lokasi',$lok)
                        ->where('id_div',$div)
                        ->get();
                        $i = 0;
                        $dept = Departemen::select('kode_dep')->where('id',$dep)->first();
                        $divi = Divisi::select('nama_div')->where('id',$div)->first();
                        $divisi = $divi['nama_div'];
                        $departemen = $dept['kode_dep'];
                        $date = Carbon::now();
                        $tglIndo = $date->locale('id_ID')->format('d F Y');
                        $nama = Auth::user()->name;
                        $nip = Auth::user()->nip;
                        return view('admin.pages.aset.print.printMesin',compact(['mesin','i','departemen','divisi','nama','tglIndo','nip']));
    }

    public function nilaiSum($lok)
    {
        $mesin = NilaiAktiva::where('id_lokasi', $lok)
                ->where('cat',2)
                ->sum('nilai');
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function nilaimesin($id)
    {
        $mesin = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',2)
                ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }
}
