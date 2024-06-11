<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    // public function save(Request $request)
    // {
    //     $nama_lokasi = $request->input('nama_lokasi');
    //     $alamat = $request->input('alamat');
    //     $lat = $request->input('lat');
    //     $long = $request->input('long');
    //     $img = $request->input('img');

    //     $imageData = base64_decode($img);


    //     $imageName = time() . '_' . uniqid() . '.jpg';
    //     file_put_contents(public_path('assets/img/lokasi/' . $imageName), $imageData);

    //     // Save other form data to the database
    //     $lokasi = new lokasi();
    //     $lokasi->lokasi = $nama_lokasi;
    //     $lokasi->alamat = $alamat;
    //     $lokasi->lat = $lat;
    //     $lokasi->long = $long;
    //     $lokasi->img = $imageName;
    //     $lokasi->save();


    //     return response()->json(['message' => 'Data inserted successfully']);
    // }

    public function save(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'wil' => 'required|numeric',
            'lat' => 'required|string|max:255',
            'long' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nama_lokasi = $request->input('lokasi');
        $alamat = $request->input('alamat');
        $wilayah = $request->input('wil');
        $lat = $request->input('lat');
        $long = $request->input('long');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/lokasi'), $imageName);

            // Save other form data to the database
            $lokasi = new Lokasi();
            $lokasi->lokasi = $nama_lokasi;
            $lokasi->alamat = $alamat;
            $lokasi->wilayah = $wilayah;
            $lokasi->lat = $lat;
            $lokasi->long = $long;
            $lokasi->img = $imageName;
            $lokasi->save();

                Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
                return redirect('/lokasis');
                //return response()->json(['message' => 'Data inserted successfully']);
        }

        return response()->json(['message' => 'Image upload failed'], 400);
    }


    public function edit($id)
    {
        $lokasi = lokasi::select('lokasis.id as idLok','lokasi','alamat','aset_wilayah.wilayah as wilayah','lat','long','img')->join('aset_wilayah','lokasis.wilayah','=','aset_wilayah.id')->where('lokasis.id',$id)->get();
        return response()->json(['data' => $lokasi]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'wil' => 'required|numeric',
            'lat' => 'required|string|max:255',
            'long' => 'required|string|max:255',
            'id' => 'required|numeric'
        ]);
        $id = $request->input('id');
        $nama_lokasi = $request->input('lokasi');
        $alamat = $request->input('alamat');
        $wilayah = $request->input('wil');
        $lat = $request->input('lat');
        $long = $request->input('long');
        //$img = $request->input('img');

        Lokasi::where('id',$id)
        ->update([

            'lokasi' => $nama_lokasi,
            'alamat' => $alamat,
            'wilayah'=> $wilayah,
            'lat' => $lat,
            'long'=> $long
        ]);
        //return $request;
        Alert::success('BERHASIL','DATA BERHASIL DIUPDATE');
        return redirect('/lokasis');
        //return response()->json(['message' => 'Data updated successfully']);
    }
    public function destroy ($id)
    {
        lokasi::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
