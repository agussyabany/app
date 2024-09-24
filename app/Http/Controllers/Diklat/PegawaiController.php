<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use App\Models\Aset\Departemen;
use App\Models\Aset\Divisi;
use App\Models\Diklat\Pegawai;
use App\Models\Aset\Jabatan;
use Illuminate\Http\Request;
use Storage;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $on = 1;
        $no = 1;
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::all();
        return view('diklat.pages.pegawai', compact('no', 'on', 'departemen', 'jabatan', 'pegawai'));
    }

    public function edit($id)
    {
        // Ambil data pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);
    
        // Pastikan data ditemukan
        if ($pegawai) {
            return response()->json($pegawai);
        } else {
            return response()->json(['error' => 'Pegawai tidak ditemukan'], 404);
        }
    }
    

public function store(Request $request)
{
    $request->validate([
        'nama_pegawai' => 'required|string|max:255',
        'nip' => 'required|string|unique:diklat_pegawai,nip',
        'jabatan' => 'required|string|max:255',
        'bagian' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    $data = $request->only(['nama_pegawai', 'nip', 'jabatan', 'bagian']);

    if ($request->hasFile('upload')) {
        // Menyimpan gambar di direktori public/asset/diklat/pegawai
        $imagePath = $request->file('upload')->move(public_path('asset/diklat/pegawai'), time().'-'.$request->file('upload')->getClientOriginalName());
        $data['img'] = 'asset/diklat/pegawai/' . basename($imagePath);
    }

    Pegawai::create($data);

    return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_pegawai' => 'required|string|max:255',
        'nip' => 'required|string|unique:diklat_pegawai,nip,' . $id,
        'jabatan' => 'required|string|max:255',
        'bagian' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $pegawai = Pegawai::findOrFail($id);
    $data = $request->only(['nama_pegawai', 'nip', 'jabatan', 'bagian']);

    if ($request->hasFile('upload')) {
        // Hapus gambar lama jika ada
        if ($pegawai->img) {
            $path = 'asset/diklat/pegawai/' . basename($pegawai->img);
            if (file_exists(public_path($path))) {
                unlink(public_path($path));
            }
        }
        $imagePath = $request->file('upload')->move(public_path('asset/diklat/pegawai'), time().'-'.$request->file('upload')->getClientOriginalName());
        $data['img'] = 'asset/diklat/pegawai/' . basename($imagePath);
    }

    $pegawai->update($data);

    return redirect()->back()->with('success', 'Pegawai berhasil diperbarui');
}


    public function save(Request $request)
{
    $request->validate([
        'nama_pegawai' => 'required',
        'nip' => 'required',
        'jabatan' => 'required',
        'bagian' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg',
    ]);

    // Data yang akan disimpan atau diperbarui
    $data = [
        'nama_pegawai' => $request->nama_pegawai,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
        'bagian' => $request->bagian,
        'img' => $request->img,
    ];

    // Jika ada file yang di-upload, simpan filenya
    if($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('asset/diklat/pegawai'), $filename);
        $data['img'] = 'asset/diklat/pegawai/' . $filename;
    }

    $id = $request->id;

    // Jika $id kosong atau null, biarkan PostgreSQL yang membuatkan id (insert baru)
    if (empty($id)) {
        Pegawai::create($data);  // Membuat record baru
    } else {
    // Update atau buat baru data pegawai
    Pegawai::updateOrCreate(
        ['id' => $request->id],   // Biarkan null jika id tidak ada, ini akan menciptakan record baru
        $data                            // Data yang diupdate atau disimpan
    );

        }
    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan');
}

// app/Http/Controllers/PegawaiController.php
public function destroy($id)
{
    $pegawai = Pegawai::findOrFail($id);

    // Menghapus gambar jika ada
    if ($pegawai->img) {
        $path = 'asset/diklat/pegawai/' . basename($pegawai->img);
        if (file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }

    // Menghapus data pegawai
    $pegawai->delete();

    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
}

}
