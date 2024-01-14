<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Sdm;
use Illuminate\Http\Request;

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

        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $ruang = Sdm::where('id',$id)->get();
        return response()->json(['data' => $ruang]);

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

                return response()->json(['data' => 'update Data Sukses']);

    }
    public function destroy ($id)
    {
        Sdm::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }

    
}
