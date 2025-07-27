<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\KibF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class KibFController extends Controller
{
    public function dep($id)
    {
        $kibF = KibF::select('kode_dep','id_dep','nama_dep','id_lokasi','lokasi')
                        ->join('departemens','kib_f_s.id_dep','=','departemens.id')
                        ->join('lokasis','kib_f_s.id_lokasi','=','lokasis.id')
                        ->where('id_lokasi',$id)
                        ->distinct('id_dep')
                        ->get();
        return response()->json([
            'data' => $kibF
          ]);
    }

    public function div($dep,$lok)
    {
        $kibF = KibF::select('nama_div','id_div','kib_f_s.id_dep')
                        ->join('divisis','kib_f_s.id_div','=','divisis.id')
                        ->where('kib_f_s.id_dep',$dep)
                        ->where('id_lokasi',$lok)
                        ->distinct('id_div')
                        ->get();
        return response()->json([
            'data' => $kibF
          ]);
    }

    public function show($lok,$dep,$div)
    {
        $f_full = KibF::select('nama_barang','tahun','kib_f_s.id as id_f','nama_div','nilai')
                            ->join('barangs','kib_f_s.id_barang','barangs.id')
                            ->join('divisis','kib_f_s.id_div','divisis.id')
                            ->where('kib_f_s.id_dep',$dep)
                            ->where('id_lokasi',$lok)
                            ->where('id_div',$div)
                            ->get();
        return response()->json([
            'data' => $f_full
          ]);
    }

    public function detail($id)
    {
        $f_full = KibF::where('kib_f_s.id',$id)
                            ->join('barangs','kib_f_s.id_barang','barangs.id')
                            ->get();
        return response()->json([
            'data' => $f_full
          ]);
    }

     public function save(Request $request)
     {
        
        try {
            $user = Auth::user()->id;
            $konstruksi = new KibF();
            $konstruksi->user = $user;

            $konstruksi->id_lokasi = $request->id_lokasi;
            $konstruksi->id_dep = $request->id_departemen;
            $konstruksi->id_div = $request->id_div;
            $konstruksi->id_barang = $request->id_barang;
            $konstruksi->struktur = $request->struktur;
            $konstruksi->materi = $request->materi;
            $konstruksi->luas = $request->luas;
            $konstruksi->tahun = $request->tahun;
            $konstruksi->type = $request->type;
            $konstruksi->status_tanah = $request->status_tanah;
            $konstruksi->status_aset = $request->status_aset;
            $konstruksi->asal = $request->asal;
            $konstruksi->nilai = $request->nilai;
            $konstruksi->urai = $request->urai;
            $konstruksi->ket = $request->ket;
            $konstruksi->input = $request->is_final ?? 0;

            if ($request->hasFile('dok')) {
                $file = $request->file('dok');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/konstruksi/dok'), $filename);
                $konstruksi->dok = $filename;
            }

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgname = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('assets/img/konstruksi/img'), $imgname);
                $konstruksi->img = $imgname;
            }

            $konstruksi->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function input()
    {
        $data = KibF::select('kib_f_s.id as idf','nama_barang','type','struktur')
                        ->join('barangs','kib_f_s.id_barang','barangs.id')
                        ->where('input',0)
                        ->get();
        return response()->json([
            'data' => $data
          ]);
    }

    public function hapus($id)
    {
        KibF::where('id', $id)->delete();
        return response()->json(['success' => true,'message' => 'Data deleted successfully']);
    }

    public function clear()
    {
        try {
            KibF::where('input', 0)->update(['input' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }
    public function edit($id)
    {
        $aset_full = KibF::select('barangs.id as idBar','nama_barang','kode_dep','nama_div','lokasi','id_lokasi','kib_f_s.id_dep as idDep','id_div','asal','nilai','struktur','materi','type','status_tanah','status_aset','luas','urai','tahun','ket','kib_f_s.img as imgF','dok')
                            ->where('kib_f_s.id',$id)
                            ->join('barangs','kib_f_s.id_barang','barangs.id')
                            ->join('divisis','kib_f_s.id_div','divisis.id')
                            ->join('departemens','kib_f_s.id_dep','=','departemens.id')
                            ->join('lokasis','kib_f_s.id_lokasi','=','lokasis.id')
                            ->get();
        return response()->json([
            'data' => $aset_full
          ]);
    }

    public function update(Request $request)
    {
        $rules = 
        [

            'id_lokasi' => 'required',
            'id_departemen' => 'required',
            'id_div' => 'required',
            'id_barang' => 'required',
            'struktur' => 'required',
            'materi' => 'required',
            'luas' => 'required',
            'tahun' => 'required',
            'type' => 'required',
            'status_tanah' => 'required',
            'status_aset' => 'required',
            'asal' => 'required',
            'nilai' => 'required',
            'urai' => 'required',
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
        $struktur =$request->input('struktur');
        $materi =$request->input('materi');
        $luas =$request->input('luas');
        $tahun =$request->input('tahun');
        $type =$request->input('type');
        $status_tanah =$request->input('status_tanah');
        $status_aset =$request->input('status_aset');
        $asal =$request->input('asal');
        $nilai =$request->input('nilai');
        $urai =$request->input('urai');
        $ket =$request->input('ket');
        
        KibF::where('id',$id)
        ->update(
            [
                    'id' => $id,
                    'id_lokasi' => $id_lokasi,
                    'id_dep' =>$id_departemen,
                    'id_div' =>$id_div,
                    'id_barang' =>$id_barang,
                    'struktur' =>$struktur,
                    'materi' =>$materi,
                    'luas' =>$luas,
                    'tahun' =>$tahun,
                    'type' =>$type,
                    'status_tanah' =>$status_tanah,
                    'status_aset' =>$status_aset,
                    'asal' =>$asal,
                    'nilai' =>$nilai,
                    'urai' =>$urai,
                    'ket' =>$ket,
                
                
            ]);
        return response()->json(['success' => true,'message' => 'Data updated successfully']);
        
    }
}
