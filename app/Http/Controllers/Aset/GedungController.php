<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aktiva;
use App\Models\Aset\Barang;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\Gedung;
use App\Models\Aset\lokasi;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Div;

class GedungController extends Controller
{
    public function dep($id)
    {
        $mesin = Gedung::select('kode_dep','id_departemen','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','gedungs.id_departemen','=','departemens.id')
                        ->join('lokasis','gedungs.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_departemen')
                        ->get();
        return response()->json([
            'data' => $mesin
          ]);
    }

    public function div($dep,$lok)
    {
        $mesin = Gedung::select('nama_div','id_div','id_departemen')
                        ->join('divisis','gedungs.id_div','=','divisis.id')
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
        $gedung_full = Gedung::all();
        $gedung_full = Gedung::select('nama_barang','guna','gedungs.id as id_gedung','nama_div','img')
                            ->join('barangs','gedungs.id_barang','barangs.id')
                            ->join('divisis','gedungs.id_div','divisis.id')
                            ->where('id_departemen',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }
    public function detail($id)
    {
        $gedung_full = Gedung::where('gedungs.id',$id)
                            ->join('barangs','gedungs.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $gedung_full
          ]);
    }

    public function print($lok,$dep,$div)
    {
        $gedung = Gedung::join('barangs','gedungs.id_barang','barangs.id')
                        ->join('divisis','gedungs.id_div','divisis.id')
                        ->where('id_departemen',$dep)
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
                        return view('admin.pages.aset.print.printGedung',compact(['gedung','i','lokasi','departemen','divisi','nama','tglIndo','struktur','nip']));
    }

    public function nilaiSum($lok)
    {
        $gedung = NilaiAktiva::where('id_lokasi', $lok)
                ->where('cat',3)
                ->sum('nilai');
        return response()->json([
            'data' => $gedung
          ]);
    }

    public function nilaigedung($id)
    {
        $gedung = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',3)
                ->get();
        return response()->json([
            'data' => $gedung
          ]);
    }

    public function save(Request $request)
     {
        
        try {
            $user = Auth::user()->id;
            $gedung = new Gedung();
            $gedung->id_user = $user;

            $gedung->id_lokasi = $request->id_lokasi;
            $gedung->id_departemen = $request->id_departemen;
            $gedung->id_div = $request->id_div;
            $gedung->id_barang = $request->id_barang;
            $gedung->kode = $request->kode;
            $gedung->reg = $request->reg;
            $gedung->kondisi = $request->kondisi;
            $gedung->konstruksi = $request->konstruksi;
            $gedung->materi = $request->materi;
            $gedung->luastanah = $request->luastanah;
            $gedung->tgl_imb = $request->tgl_imb;
            $gedung->no_imb = $request->no_imb;
            $gedung->luas = $request->luas;
            $gedung->status = $request->status;
            $gedung->kode_tanah = $request->kode_tanah;
            $gedung->asal = $request->asal;
            $gedung->nilai = $request->nilai;
            $gedung->ket = $request->ket;
            $gedung->input = $request->is_final ?? 0;

            if ($request->hasFile('dok')) {
                $file = $request->file('dok');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/gedung/dok'), $filename);
                $gedung->dok = $filename;
            }

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgname = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('assets/img/gedung/img'), $imgname);
                $gedung->img = $imgname;
            }

            $gedung->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
     }

    public function aktiva ()
    {
        $aktiva = Aktiva::where('kib','KIB C - GEDUNG DAN BANGUNAN')->get();
        return response()->json(['data' => $aktiva]);

    }

    public function barang ($id)
    {
        $barang = Barang::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }

    public function input()
    {
        $data = Gedung::select('gedungs.id as idb','nama_barang','kode_barang','luas','konstruksi')
                        ->join('barangs','gedungs.id_barang','barangs.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $data
          ]);
    }

    public function hapus($id)
    {
        Gedung::where('id', $id)->delete();
        return response()->json(['success' => true,'message' => 'Data deleted successfully']);
    }

    public function clear()
    {
        try {
            Gedung::where('input', 0)->update(['input' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($id)
    {
        $gedung_full = Gedung::select('barangs.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','id_departemen','id_div','kode','reg','asal','nilai','susut','kondisi','konstruksi','materi','status','luas','luastanah','kode_tanah','no_imb','tgl_imb','ket','gedungs.img as imgC','guna','dok')
                            ->where('gedungs.id',$id)
                            ->join('barangs','gedungs.id_barang','barangs.id')
                            ->join('divisis','gedungs.id_div','divisis.id')
                            ->join('departemens','gedungs.id_departemen','=','departemens.id')
                            ->join('lokasis','gedungs.id_lokasi','=','lokasis.id')
                            ->get();
        return response()->json([
            'data' => $gedung_full
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
            'luastanah' => 'required',
            'tgl_imb' => 'required',
            'no_imb' => 'required',
            'luas' => 'required|numeric',
            'kode_tanah'=> 'required',
            'asal' => 'required',
            'nilai' => 'required',
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
        $konstruksi =$request->input('konstruksi');
        $materi =$request->input('materi');
        $luastanah =$request->input('luastanah');
        $tgl_imb =$request->input('tgl_imb');
        $no_imb =$request->input('no_imb');
        $luas =$request->input('luas');
        $status =$request->input('status');
        $kode_tanah =$request->input('kode_tanah');
        $asal =$request->input('asal');
        $nilai =$request->input('nilai');
        $ket =$request->input('ket');


       

        Gedung::where('id',$id)
        ->update(
            [
                    'id' => $id,
                    'id_lokasi' => $id_lokasi,
                    'id_departemen' =>$id_departemen,
                    'id_div' =>$id_div,
                    'id_barang' =>$id_barang,
                    'kode' =>$kode,
                    'reg' =>$reg,
                    'kondisi' =>$kondisi,
                    'konstruksi' =>$konstruksi,
                    'materi' =>$materi,
                    'luastanah' =>$luastanah,
                    'tgl_imb' =>$tgl_imb,
                    'no_imb' =>$no_imb,
                    'luas' =>$luas,
                    'status' =>$status,
                    'kode_tanah' =>$kode_tanah,
                    'asal' =>$asal,
                    'nilai' =>$nilai,
                    'ket' =>$ket,
                
                
            ]);
        return response()->json(['success' => true,'message' => 'Data updated successfully']);
        
    }
}
