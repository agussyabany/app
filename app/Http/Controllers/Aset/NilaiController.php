<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\NilaiAktiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiController extends Controller
{
    public function save(Request $request)
    {
        $no_voucher = $request->input('no_voucher');
        $tgl_voucher = $request->input('tgl_voucher');
        $id_aktiva = $request->input('id_aktiva');
        $nilai = $request->input('nilai');
        $urai = $request->input('urai');
        $tahun = $request->input('tahun');
        $id_lokasi = $request->input('id_lokasi');
        $dep = $request->input('dep');
        $div = $request->input('div');
        $cat = $request->input('cat');

        NilaiAktiva::create([
            'no_voucher' => $no_voucher,
            'tgl_voucher' => $tgl_voucher,
            'tahun' => $tahun,
            'id_aktiva' => $id_aktiva,
            'nilai'=>$nilai,
            'urai'=>$urai,
            'tahun'=>$tahun,
            'id_lokasi'=>$id_lokasi,
            'dep'=>$dep,
            'div'=>$div,
            'cat'=>$cat,
            'user'=>Auth::user()->id,
            'created_at'=>Carbon::now()

        ]);


        Alert::success('BERHASIL','DATA BERHASIL DITAMBAH');
        return redirect('/nilai');
    }

    public function edit($id)
    {
        $aktiva = NilaiAktiva::select('id','no_voucher','tgl_voucher','id_aktiva','nilai','urai','tahun','id_lokasi','dep','div','cat')
                            ->where('id',$id)
                            ->get();
        return response()->json(['data' => $aktiva]);
    }

    public function update (Request $request)
    {
        $id = $request->input('id_nilai');
        $no_voucher = $request->input('no_voucher');
        $tgl_voucher = $request->input('tgl_voucher');
        $id_aktiva = $request->input('id_aktiva');
        $nilai = $request->input('nilai');
        $urai = $request->input('urai');
        $tahun = $request->input('tahun');
        $id_lokasi = $request->input('id_lokasi');
        $dep = $request->input('dep');
        $div = $request->input('div');
        $cat = $request->input('cat');
        NilaiAktiva::where('id',$id)
                ->update([
                    'no_voucher' => $no_voucher,
                    'tgl_voucher' => $tgl_voucher,
                    'tahun' => $tahun,
                    'id_aktiva' => $id_aktiva,
                    'nilai'=>$nilai,
                    'urai'=>$urai,
                    'tahun'=>$tahun,
                    'id_lokasi'=>$id_lokasi,
                    'dep'=>$dep,
                    'div'=>$div,
                    'cat'=>$cat
                ]);

        Alert::success('BERHASIL','DATA BERHASIL DIUPDATE');
        return redirect('/nilai');

    }
    public function destroy ($id)
    {
        NilaiAktiva::where('id', $id)->delete();
        Alert::success('BERHASIL','DATA BERHASIL DIHAPUS');
        return redirect('/nilai');
    }
}
