<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function save(Request $request)
    {
        $no = $request->input('no');
        $tgl = $request->input('tgl');
        $tahun = $request->input('tahun');
        $kode = $request->input('kode_aktiva');
        $nilai = $request->input('nilai');
        $urai = $request->input('urai');

        NilaiAktiva::insert([
            'no_voucher' => $no,
            'tgl_voucher' => $tgl,
            'tahun' => $tahun,
            'id_aktiva' => $kode,
            'nilai'=>$nilai,
            'urai'=>$urai,
            'user'=>Auth::user()->id,
            'created_at'=>Carbon::now()

        ]);


        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function edit($id)
    {
        $aktiva = NilaiAktiva::select('nilai_aktivas.id as idn','aktivas.id as idA','no_voucher','tgl_voucher','kode','aktiva','nilai','urai','tahun')
                            ->join('aktivas','nilai_aktivas.id_aktiva','=','aktivas.id')
                            ->get();



        return response()->json(['data' => $aktiva]);
    }

    public function update (Request $request)
    {
        $id = $request->input('id');
        $no = $request->input('no');
        $tgl = $request->input('tgl');
        $tahun = $request->input('tahun');
        $kode = $request->input('kode_aktiva');
        $nilai = $request->input('nilai');
        $urai = $request->input('urai');
        NilaiAktiva::where('id',$id)
                ->update([
                    'no_voucher' => $no,
                    'tgl_voucher' => $tgl,
                    'tahun' => $tahun,
                    'id_aktiva' => $kode,
                    'nilai'=>$nilai,
                    'urai'=>$urai,
                ]);

                return response()->json(['data' => 'update Data Sukses']);

    }
    public function destroy ($id)
    {
        NilaiAktiva::where('id', $id)->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
