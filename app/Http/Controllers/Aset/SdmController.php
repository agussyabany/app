<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Sdm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SdmController extends Controller
{
    public function save(Request $request)
    {

        $nama = $request->input('nama');
        $nip = $request->input('nip');
        $jabat = $request->input('jabat');
        $div = $request->input('div');

        Sdm::insert([
            'nama_sdm' => $nama,
            'nip' => $nip,
            'id_jabat' => $jabat,
            'id_div'=> $div
        ]);

                Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
                return redirect('/sumber');
                //return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $sdm = sdm::select('jabatans.id as idJabat','divisis.id as idDiv','nama_sdm','nip','nama_div','jabat')
                    ->join('divisis','sdms.id_div','=','divisis.id')
                    ->join('jabatans','sdms.id_jabat','=','jabatans.id')
                    ->where('sdms.id',$id)
                    ->get();
        return response()->json(['data' => $sdm]);

    }

    public function update (Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');
        $nip = $request->input('nip');
        $jabat = $request->input('jabat');
        $div = $request->input('div');
        Sdm::where('id',$id)
                ->update([
                    
                    'nama_sdm' => $nama,
                    'nip' => $nip,
                    'id_jabat' => $jabat,
                    'id_div'=> $div
                ]);

                Alert::success('BERHASIL','DATA BERHASIL DIUPDATE');
                return redirect('/sumber');
                //return response()->json(['data' => 'update Data Sukses']);

    }
    public function destroy ($id)
    {
        Sdm::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }

    
}
