<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\KibD;
use App\Models\Aset\lokasi;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KibDController extends Controller
{
    public function nilaiD($id)
    {
        $kibD = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('kib', 'KIB D - JALAN, IRIGASI DAN JARINGAN')
                ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function dep($id)
    {
        $kibD = KibD::select('kib_d_s.id as idD','kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_d_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_d_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function div($dep,$lok)
    {
        $kibD = KibD::select('nama_div','id_div','kib_d_s.id_dep')
                        ->join('divisis','kib_d_s.id_div','=','divisis.id')
                        ->where('kib_d_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibD
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $d_full = KibD::select('nama_barang','kode','kib_d_s.id as id_d','nama_div','reg','img')
                            ->join('barangs','kib_d_s.id_barang','barangs.id')
                            ->join('divisis','kib_d_s.id_div','divisis.id')
                            ->where('kib_d_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->orderby('kib_d_s.id', 'ASC')
                            ->get();
        return response()->json([
            'data' => $d_full
          ]);
    }

    public function detail($id)
    {
        $d_full = KibD::where('kib_d_s.id',$id)
                            ->join('barangs','kib_d_s.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $d_full
          ]);
    }

    public function save(Request $request)
     {
        
        try {
            $user = Auth::user()->id;
            $jalan = new KibD();
            $jalan->user = $user;

            $jalan->id_lokasi = $request->id_lokasi;
            $jalan->id_dep = $request->id_departemen;
            $jalan->id_div = $request->id_div;
            $jalan->id_barang = $request->id_barang;
            $jalan->kode = $request->kode;
            $jalan->reg = $request->reg;
            $jalan->kondisi = $request->kondisi;
            $jalan->struktur = $request->konstruksi;
            $jalan->materi = $request->materi;
            $jalan->luas_lantai = $request->luas_lantai;
            $jalan->tgl_dok = $request->tgl_dok;
            $jalan->no_dok = $request->no_dok;
            $jalan->luas = $request->luas;
            $jalan->status = $request->status;
            $jalan->kode_tanah = $request->kode_tanah;
            $jalan->asal = $request->asal;
            $jalan->harga = $request->nilai;
            $jalan->ket = $request->ket;
            $jalan->input = $request->is_final ?? 0;

            if ($request->hasFile('dok')) {
                $file = $request->file('dok');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/jalan/dok'), $filename);
                $jalan->dok = $filename;
            }

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgname = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('assets/img/jalan/img'), $imgname);
                $jalan->img = $imgname;
            }

            $jalan->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
     }

     public function input()
    {
        $data = KibD::select('kib_d_s.id as idb','nama_barang','kode_barang','luas','struktur')
                        ->join('barangs','kib_d_s.id_barang','barangs.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $data
          ]);
    }

    public function hapus($id)
    {
        KibD::where('id', $id)->delete();
        return response()->json(['success' => true,'message' => 'Data deleted successfully']);
    }
    public function clear()
    {
        try {
            KibD::where('input', 0)->update(['input' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($id)
    {
        $jalan_full = KibD::select('kib_d_s.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','kib_d_s.id_dep as idDep','id_div','kode','reg','asal','kondisi','struktur','materi','status','luas','luas_lantai','kode_tanah','no_dok','tgl_dok','ket','kib_d_s.img as imgD','dok')
                            ->where('kib_d_s.id',$id)
                            ->join('barangs','kib_d_s.id_barang','barangs.id')
                            ->join('divisis','kib_d_s.id_div','divisis.id')
                            ->join('departemens','kib_d_s.id_dep','=','departemens.id')
                            ->join('lokasis','kib_d_s.id_lokasi','=','lokasis.id')
                            ->get();
        return response()->json([
            'data' => $jalan_full
          ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'id_lokasi' => 'required',
            'id_departemen' => 'required',
            'id_div' => 'required',
            'id_barang' => 'required',
            'kode' => 'required',
            'reg' => 'required',
            'kondisi' => 'required',
            'konstruksi' => 'required',
            'luas_lantai' => 'required',
            'tgl_dok' => 'required',
            'no_dok' => 'required',
            'luas' => 'required|numeric',
            'kode_tanah'=> 'required',
            'asal' => 'required',
            //'nilai' => 'required',
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
        $id_lokasi = $request->input('id_lokasi');
        $id_departemen =$request->input('id_departemen');
        $id_div =$request->input('id_div');
        $id_barang =$request->input('id_barang');
        $kode =$request->input('kode');
        $reg =$request->input('reg');
        $kondisi =$request->input('kondisi');
        $struktur =$request->input('konstruksi');
        $materi =$request->input('materi');
        $luas_lantai =$request->input('luas_lantai');
        $tgl_dok =$request->input('tgl_dok');
        $no_dok =$request->input('no_dok');
        $luas =$request->input('luas');
        $status =$request->input('status');
        $kode_tanah =$request->input('kode_tanah');
        $asal =$request->input('asal');
        $nilai =$request->input('nilai');
        $ket =$request->input('ket');


       

        KibD::where('id',$id)
        ->update(
            [
                    'id' => $id,
                    'id_lokasi' => $id_lokasi,
                    'id_dep' =>$id_departemen,
                    'id_div' =>$id_div,
                    'id_barang' =>$id_barang,
                    'kode' =>$kode,
                    'reg' =>$reg,
                    'kondisi' =>$kondisi,
                    'struktur' =>$struktur,
                    'materi' =>$materi,
                    'luas_lantai' =>$luas_lantai,
                    'tgl_dok' =>$tgl_dok,
                    'no_dok' =>$no_dok,
                    'luas' =>$luas,
                    'status' =>$status,
                    'kode_tanah' =>$kode_tanah,
                    'asal' =>$asal,
                    //'nilai' =>$nilai,
                    'ket' =>$ket,
                
                
            ]);
        return response()->json(['success' => true,'message' => 'Data updated successfully']);
        
    }
    public function print($lok,$dep,$div)
    {
        $jalan = KibD::join('barangs','kib_d_s.id_barang','barangs.id')
                        ->join('divisis','kib_d_s.id_div','divisis.id')
                        ->where('kib_d_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->where('id_div',$div)
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
                        return view('admin.pages.aset.print.printJalan',compact(['jalan','i','lokasi','departemen','divisi','nama','tglIndo','struktur','nip']));
    }
    public function nilaijalan($id)
    {
        $gedung = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('kib', 'KIB D - JALAN, IRIGASI DAN JARINGAN')
                ->get();
        return response()->json([
            'data' => $gedung
          ]);
    }

    public function foto(Request $request, $id)
        {
            $request->validate([
                'editGambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

                $jalan = KibD::findOrFail($id);

                //Simpan file baru
                $file = $request->file('editGambar');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/img/jalan/img'), $filename);

                //Update DB
                $jalan->img = $filename;
                $jalan->save();

                return response()->json([
                    'success' => true
                ]);
            }
}
