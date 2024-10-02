<?php

namespace App\Http\Controllers\LiveLine;

use App\Http\Controllers\Controller;
use App\Models\liveline\Rapat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RapatController extends Controller
{
    public function index()
    {
        $no = 1;
        $tglIndo = Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y');
        $rapat = Rapat::orderBy('tgl', 'ASC')->get();
        return view('Liveline.pages.rapat',compact(['tglIndo','rapat','no']));

    }

    public function save(Request $request)
    {
        $agenda = $request->input('agenda');
        $peserta = $request->input('peserta');
        $tgl = $request->input('tgl');
        $tempat = $request->input('tempat');

        
        Rapat::insert([
            
            'agenda' => $agenda,
            'peserta' => $peserta,
            'tgl' => $tgl,
            'tempat' => $tempat,
        ]);
        Alert::success('BERHASIL','Data Berhasil Dismpan');
        return redirect('/rapat');
    }
}
