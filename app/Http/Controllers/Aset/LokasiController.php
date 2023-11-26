<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LokasiController extends Controller
{
    public function save(Request $request)
    {
        $nama_lokasi = $request->input('nama_lokasi');
        $alamat = $request->input('alamat');
        $lat = $request->input('lat');
        $long = $request->input('long');
        $img = $request->input('img');

        $imageData = base64_decode($img);

        
        $imageName = time() . '_' . uniqid() . '.jpg';
        file_put_contents(public_path('assets/img/lokasi/' . $imageName), $imageData);

        // Save other form data to the database
        $lokasi = new lokasi();
        $lokasi->lokasi = $nama_lokasi;
        $lokasi->alamat = $alamat;
        $lokasi->lat = $lat;
        $lokasi->long = $long;
        $lokasi->img = $imageName;
        $lokasi->save();


        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $lokasi = lokasi::where('id',$id)->get();
        return response()->json(['data' => $lokasi]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $nama_lokasi = $request->input('nama_lokasi');
        $alamat = $request->input('alamat');
        $lat = $request->input('lat');
        $long = $request->input('long');
        $img = $request->input('img');

        Lokasi::where('id',$id)
        ->update([
            
            'lokasi' => $nama_lokasi,
            'alamat' => $alamat,
            'lat' => $lat,
            'long'=> $long
        ]);
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function destroy ($id)
    {
        lokasi::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
