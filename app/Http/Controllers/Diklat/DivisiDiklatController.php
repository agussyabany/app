<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use App\Models\Aset\Divisi;
use Illuminate\Http\Request;
use App\Models\Diklat\bagian;
use RealRashid\SweetAlert\Facades\Alert;
class DivisiDiklatController extends Controller
{
    // Fungsi untuk menampilkan view dengan data divisi
    public function index()
    {
<<<<<<< HEAD
        $on=3;
        $divisi=Divisi::get();
        return view('diklat.pages.divisidiklat',compact(['on'], 'divisi'));
    }

    public function save( Request $request)
    {
     
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|email|string|max:255',
            'jabatan' => 'required|min:1|numeric',
            'divisi' => 'required|numeric',
            // 'upload' => 'required|file|mimes:pdf,doc,docx|max:2048',  // Validasi untuk file
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi untuk gambar

        ]);
        return $request;
=======
        $bagian = bagian::all(); // Mengambil semua data divisi dari database
        $on = 3; // Variabel tambahan jika diperlukan
        return view('diklat.pages.divisidiklat', compact('bagian', 'on')); // Mengirim data ke view
>>>>>>> 687e8359e353a48f9554105fd17b64f2bc1eb285
    }

    public function save(Request $request){
        
        $request->validate([
            'nama_bagian' => 'required|string|max:255',
            
        ]);
    
        $nama_bagian = $request->input('nama_bagian');
      
    
            // Save other form data to the database
            // $bagian = new bagian();
            // $bagian->bagian = $nama_bagian;
            // $bagian->save();
            bagian::insert([
                'bagian'=> $nama_bagian
            ]);
    
            return redirect()->back()->with('success', 'Data berhasil ditambah');
                //return response()->json(['message' => 'Data inserted successfully']);
        }

// Fungsi update Data
        public function update(Request $request, $id)
        {
            $request->validate([
                'bagian' => 'required|string|max:255',
            ]);
        
            $bagian = Bagian::findOrFail($id);
            $bagian->bagian = $request->input('bagian');
            $bagian->save();
        
            // Kembalikan data JSON setelah berhasil update
            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
            //return response()->json(['id' => $bagian->id, 'bagian' => $bagian->bagian]);
        }
        


        
        
// Fungsi hapus Data
        public function destroy($id)
        {
            // Cari data bagian berdasarkan ID
            $bagian = Bagian::find($id);
        
            if (!$bagian) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }
        
            // Hapus data
            $bagian->delete();
        
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }
        

    }


