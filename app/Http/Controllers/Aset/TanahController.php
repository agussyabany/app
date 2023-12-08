<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TanahController extends Controller
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
}
