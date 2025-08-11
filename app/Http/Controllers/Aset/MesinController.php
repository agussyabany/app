<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aktiva;
use App\Models\Aset\Barang;
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
        $mesin_full = Mesin::select('barangs.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','id_departemen','id_div','kode','reg','tahun','harga','susut','bahan','asal','ukuran','merk','pabrik','rangka','mesin','polisi','bpkb','ket','mesins.id as id_mesin','guna','fungsi','jenis','id_voucher2','kodisi')
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
        
        try {
            $user = Auth::user()->id;
            $mesin = new Mesin();
            $mesin->id_user = $user;
            $mesin->id_lokasi = $request->lokasi;
            $mesin->id_departemen = $request->dep;
            $mesin->id_div = $request->div;
            $mesin->jenis = $request->jenis;
            $mesin->id_voucher2 = $request->id_voucher2;
            $mesin->id_barang = $request->nama_aset;
            $mesin->kode = $request->kode_aset;
            $mesin->reg = $request->reg;
            $mesin->merk = $request->merk;
            $mesin->ukuran = $request->ukuran;
            $mesin->fungsi = $request->fungsi;
            $mesin->guna = $request->guna;
            $mesin->bahan = $request->bahan;
            $mesin->tahun = $request->tahun;
            $mesin->kodisi = $request->kondisi_b;
            $mesin->asal = $request->asal;
            $mesin->harga = $request->nilai;
            $mesin->pabrik = $request->pabrik;
            $mesin->rangka= $request->rangka;
            $mesin->mesin = $request->mesin;
            $mesin->polisi = $request->nopol;
            $mesin->bpkb = $request->bpkb;
            $mesin->ket = $request->ket;
            $mesin->input = $request->is_final ?? 0;

            if ($request->hasFile('dok')) {
                $file = $request->file('dok');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/mesin/dok'), $filename);
                $mesin->dok = $filename;
            }

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgname = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('assets/img/mesin/gbr'), $imgname);
                $mesin->img = $imgname;
            }

            $mesin->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
     }

    public function input()
    {
        $data = Mesin::select('mesins.id as idb','nama_barang','kode_barang','merk','guna','kode')
                        ->join('barangs','mesins.id_barang','barangs.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $data
          ]);

   
    }

    public function clear()
    {
        try {
            Mesin::where('input', 0)->update(['input' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    public function hapus($id)
    {
        Mesin::where('id', $id)->delete();
        return response()->json(['success' => true,'message' => 'Data deleted successfully']);
    }

    public function update(Request $request)
    {
        $rules = [
            'lokasi' => 'required',
            'dep' => 'required',
            'div' => 'required',
            //'jenis' => 'required',
            //'id_voucher2' => 'required',
            'nama_aset' => 'required',
            'kode_aset' => 'required',
            'reg' => 'required',
            'merk' => 'required',
            'ukuran' => 'required',
            'fungsi' => 'required',
            'guna' => 'required',
            'bahan' => 'required',
            'tahun' => 'required|numeric',
            'kondisi_b'=> 'required',
            'asal' => 'required',
            'nilai' => 'required',
            
            // 'pabrik' => 'required',
            // 'rangka' => 'required',
            // 'mesin' => 'required',
            // 'nopol' => 'required',
            // 'bpkb' => 'required',
            
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
        // $jenis = $request->input('jenis');
        // $id_voucher2 = $request->input('id_voucher2');
        $nama_aset = $request->input('nama_aset');
        $kode_aset = $request->input('kode_aset');
        $reg = $request->input('reg');
        $merk = $request->input('merk');
        $ukuran = $request->input('ukuran');
        $fungsi = $request->input('fungsi');
        $guna = $request->input('guna');
        $bahan = $request->input('bahan');
        $tahun = $request->input('tahun');
        $kondisi = $request->input('kondisi_b');
        $asal = $request->input('asal');
        $nilai = $request->input('nilai');
        
        $pabrik = $request->input('pabrik');
        $rangka = $request->input('rangka');
        $mesin = $request->input('mesin');
        $nopol = $request->input('nopol');
        $bpkb = $request->input('bpkb');
        
        $ket = $request->input('ket');
       

        Mesin::where('id',$id)
        ->update(
            [
                'id_lokasi' => $lokasi,
                'id_departemen' => $dep,
                'id_div' => $div,
                'id_barang' => $nama_aset,
                'kode' => $kode_aset,
                'reg' => $reg,
                'merk' => $merk,
                'ukuran' => $ukuran,
                'fungsi' => $fungsi,
                'guna' => $guna,
                'bahan' => $bahan,
                'tahun' => $tahun,
                'kodisi' => $kondisi,
                'asal' => $asal,
                'harga' => $nilai,
                
               
                
                'pabrik' => $pabrik,
                'rangka' => $rangka,
                'mesin' => $mesin,
                'polisi' => $nopol,
                'bpkb' => $bpkb,
                'ket' => $ket,
                
                'id_user' => $user,
                
                
            ]);
        return response()->json(['success' => true,'message' => 'Data updated successfully']);
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
                ->where('kib','KIB B - PERALATAN DAN MESIN')
                ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function vMesin()
    {
        $v_mesin = NilaiAktiva::select('no_voucher')
                ->distinct()
                ->where('cat', 2)
                ->get();
        return response()->json(['data' => $v_mesin]);
    }

    public function aktiva ()
    {
        $aktiva = Aktiva::where('kib','KIB B - PERALATAN DAN MESIN')->get();
        return response()->json(['data' => $aktiva]);

    }

    public function barang ($id)
    {
        $barang = Barang::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }

    public function foto(Request $request, $id)
{
    $request->validate([
        'editGambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

        $mesin = Mesin::findOrFail($id);

     // Hapus file lama jika ada
      // $oldFile = public_path('assets/img/mesin/gbr' . $lokasi->img);
     // if (file_exists($oldFile) && is_file($oldFile)) {
    //     unlink($oldFile);
    // }

        //Simpan file baru
        $file = $request->file('editGambar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img//mesin/gbr'), $filename);

        //Update DB
        $mesin->img = $filename;
        $mesin->save();

        return response()->json([
            'success' => true
        ]);

        //return [$request->all(),$id];
}

}
