<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemateri;
use RealRashid\SweetAlert\Facades\Alert;

class PemateriController extends Controller
{
    public function index(){

        $pemateri = pemateri::all();
        $on=2;
        return view('diklat.pages.pemateri',compact('pemateri', 'on')); 
    }
    // Fungsi simpan Data
    public function save(Request $request){
        
        $request->validate([
            'nama_pemateri' => 'required|string|max:255',
            
        ]);

        $request->validate([
            'asal' => 'required|string|max:255',
            
        ]);
    
        $nama_pemateri = $request->input('nama_pemateri');
        $asal = $request->input('asal');
      
    
            // Save other form data to the database
            // $bagian = new bagian();
            // $bagian->bagian = $nama_bagian;
            // $bagian->save();
            pemateri::insert([
                'nama_pemateri' => $nama_pemateri,
                'asal' => $asal // gabungkan insert kolom asal di tabel yang sama
            ]);
            
    
               // Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
               return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil ditambah.');
                //return response()->json(['message' => 'Data inserted successfully']);
        }

// Fungsi Edit Data
        public function edit($id) {
            // Cari data pemateri berdasarkan ID
            $pemateri = Pemateri::find($id);
             return view('edit', compact('pemateri'));
        }

// Fungsi update Data
       public function update(Request $request, $id)
{
    $request->validate([
        'pemateri' => 'required|string|max:255',
        'asal' => 'required|string|max:255',
    ]);

    $pemateri = Pemateri::findOrFail($id);
    $pemateri->nama_pemateri = $request->input('pemateri'); // Ganti 'nama' dengan 'nama_pemateri'
    $pemateri->asal = $request->input('asal');
    $pemateri->save();

    return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil diperbarui.');
}

// Fungsi hapus Data 
        public function destroy($id) {
            // Cari pemateri berdasarkan ID
            $pemateri = pemateri::find($id);
        
            if ($pemateri) {
                // Hapus data pemateri
                $pemateri->delete();
        
                return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil dihapus!');
            } else {
                return redirect()->route('pemateri.index')->with('error', 'Pemateri tidak ditemukan.');
            }
        }
        
        
        

    
}
