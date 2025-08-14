<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Barang;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Aset\KibE;
use App\Models\Aset\lokasi;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KibEContrller extends Controller
{
    public function nilaiE($id)
    {
        $kibE = NilaiAktiva::join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id',)
                ->where('id_lokasi', $id)
                ->where('cat',6)
                ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function dep($id)
    {
        $kibE = KibE::select('kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_e_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_e_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function div($dep,$lok)
    {
        $kibE = KibE::select('nama_div','id_div','kib_e_s.id_dep')
                        ->join('divisis','kib_e_s.id_div','=','divisis.id')
                        ->where('kib_e_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibE
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $e_full = KibE::select('nama_barang','kode','kib_e_s.id as id_e','nama_div','reg','img')
                            ->join('barangs','kib_e_s.id_barang','barangs.id')
                            ->join('divisis','kib_e_s.id_div','divisis.id')
                            ->where('kib_e_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $e_full
          ]);
    }

    public function detail($id)
    {
        $e_full = KibE::where('kib_e_s.id',$id)
                            ->join('barangs','kib_e_s.id_barang','barangs.id')
                            ->join('bahans','kib_e_s.id_bahan','bahans.id')
                            ->get();
        return response()->json([
            'data' => $e_full
          ]);
    }

    public function barang ($id)
    {
        $barang = Barang::where('id',$id)->get();
        return response()->json(['data' => $barang]);
    }

    public function save(Request $request)
     {
        
        try {
            $user = Auth::user()->id;
            $aset = new KibE();
            $aset->user = $user;

            $aset->id_lokasi = $request->id_lokasi;
            $aset->id_dep = $request->id_departemen;
            $aset->id_div = $request->id_div;
            $aset->id_barang = $request->id_barang;
            $aset->kode = $request->kode;
            $aset->reg = $request->reg;
            $aset->kondisi = $request->kondisi;
            $aset->id_bahan = $request->id_bahan;
            $aset->tahun = $request->tahun;
            $aset->jumlah = $request->jumlah;
            $aset->asal = $request->asal;
            $aset->ket = $request->ket;
            $aset->input = $request->is_final ?? 0;

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgname = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('assets/img/aset_tetap/img'), $imgname);
                $aset->img = $imgname;
            }

            $aset->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
     }
public function input()
    {
        $data = KibE::select('kib_e_s.id as ide','nama_barang','kode_barang','jumlah','kode')
                        ->join('barangs','kib_e_s.id_barang','barangs.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $data
          ]);
    }

    public function hapus($id)
    {
        KibE::where('id', $id)->delete();
        return response()->json(['success' => true,'message' => 'Data deleted successfully']);
    }

    public function edit($id)
    {
        $aset_full = KibE::select('barangs.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','kib_e_s.id_dep as idDep','id_div','kode','reg','asal','kondisi','ket','tahun','jumlah','bahans.id as idBah','nama','kib_e_s.img as imgE')
                            ->where('kib_e_s.id',$id)
                            ->join('bahans','kib_e_s.id_bahan','bahans.id')
                            ->join('barangs','kib_e_s.id_barang','barangs.id')
                            ->join('divisis','kib_e_s.id_div','divisis.id')
                            ->join('departemens','kib_e_s.id_dep','=','departemens.id')
                            ->join('lokasis','kib_e_s.id_lokasi','=','lokasis.id')
                            ->get();
        return response()->json([
            'data' => $aset_full
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
            'asal' => 'required',
            'tahun'=> 'required',
            'jumlah'=> 'required',
            'id_bahan'=> 'required',
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
        $tahun =$request->input('tahun');
        $id_bahan =$request->input('id_bahan');
        $jumlah =$request->input('jumlah');
        $asal =$request->input('asal');
        $ket =$request->input('ket');
        
        KibE::where('id',$id)
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
                    'tahun' =>$tahun,
                    'id_bahan' =>$id_bahan,
                    'jumlah' =>$jumlah,
                    'asal' =>$asal,
                    'ket' =>$ket,
                
                
            ]);
        return response()->json(['success' => true,'message' => 'Data updated successfully']);
      
        
    }

    public function clear()
    {
        try {
            KibE::where('input', 0)->update(['input' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    public function print($lok,$dep,$div)
    {
        $aset = KibE::join('barangs','kib_e_s.id_barang','barangs.id')
                        ->join('divisis','kib_e_s.id_div','divisis.id')
                        ->join('bahans','kib_e_s.id_bahan','bahans.id')
                        ->where('kib_e_s.id_dep',$dep)
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
                        return view('admin.pages.aset.print.printAset',compact(['aset','i','lokasi','departemen','divisi','nama','tglIndo','struktur','nip']));
    }

    public function foto(Request $request, $id)
        {
            $request->validate([
                'editGambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

                $aset = KibE::findOrFail($id);

                //Simpan file baru
                $file = $request->file('editGambar');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/img/aset_tetap/img'), $filename);

                //Update DB
                $aset->img = $filename;
                $aset->save();

                return response()->json([
                    'success' => true
                ]);
            }
}
