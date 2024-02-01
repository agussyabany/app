<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Gedung;
use App\Models\Aset\Kir;
use App\Models\Aset\lokasi;
use App\Models\Aset\Mesin;
use App\Models\Aset\NilaiAktiva;
use App\Models\Aset\Tanah;
use Illuminate\Http\Request;

class Webcontroller extends Controller
{
    public function index()

    {
        $tanah = Tanah::count('id');
        $mesin = Mesin::count('id');
        $gedung = Gedung::count('id');
        $kir = Kir::count('id');
        $total  = NilaiAktiva::sum('nilai');
        $initMarker = lokasi::select('lat','long')->get();

        $a = NilaiAktiva::whereIn('id_aktiva',[1,2])
                         ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $aJuni = NilaiAktiva::whereIn('id_aktiva',[1,2])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');


        $b = NilaiAktiva::whereIn('id_aktiva',[6,34,35,36])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $bJuni = NilaiAktiva::whereIn('id_aktiva',[6,34,35,36])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');

        $c = NilaiAktiva::whereIn('id_aktiva',[26,27,28,29,30,31,32])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $cJuni = NilaiAktiva::whereIn('id_aktiva',[26,27,28,29,30,31,32])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');

        $d = NilaiAktiva::whereIn('id_aktiva',[3,4,5,33])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $dJuni = NilaiAktiva::whereIn('id_aktiva',[3,4,5,33])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');

        $e = NilaiAktiva::whereIn('id_aktiva',[18,19,20,21,22,23,24,25])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $eJuni = NilaiAktiva::whereIn('id_aktiva',[18,19,20,21,22,23,24,25])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');


        $f = NilaiAktiva::whereIn('id_aktiva',[37,38,39,40,41,42,43,44,45,46])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $fJuni = NilaiAktiva::whereIn('id_aktiva',[37,38,39,40,41,42,43,44,45,46])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');


        $g = NilaiAktiva::whereIn('id_aktiva',[7,8,9,10,11,12])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $gJuni = NilaiAktiva::whereIn('id_aktiva',[7,8,9,10,11,12])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');


        $h = NilaiAktiva::whereIn('id_aktiva',[48,49,50,51])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $hJuni = NilaiAktiva::whereIn('id_aktiva',[48,49,50,51])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');

        $i = NilaiAktiva::whereIn('id_aktiva',[13,14,15,16,17])
                        ->whereBetween('tgl_voucher', ['1980-01-01', '2023-05-31'])
                        ->sum('nilai');
        $iJuni = NilaiAktiva::whereIn('id_aktiva',[13,14,15,16,17])
                        ->whereBetween('tgl_voucher', ['2023-06-01', '2023-06-30'])
                        ->sum('nilai');

        $total2023 = $a+$b+$c+$d+$e+$f+$g+$h+$i;
        $juni2023 = $aJuni+$bJuni+$cJuni+$dJuni+$eJuni+$fJuni+$gJuni+$hJuni+$iJuni;

        return view('admin.landingPage.pages.index',compact(['tanah','mesin','gedung','kir','initMarker','total','a','aJuni','b','bJuni','c','cJuni','d','dJuni','e','eJuni','f','fJuni','g','gJuni','h','hJuni','i','iJuni','total2023','juni2023']));
    }

    public function nilai()
    {

        $sum8085 = NilaiAktiva::whereBetween('tgl_voucher', ['1980-01-01','1985-12-31'])->sum('nilai');
        $sum8590 = NilaiAktiva::whereBetween('tgl_voucher', ['1985-01-01','1990-12-31'])->sum('nilai');
        $sum9095 = NilaiAktiva::whereBetween('tgl_voucher', ['1990-01-01','1995-12-31'])->sum('nilai');
        $sum9520 = NilaiAktiva::whereBetween('tgl_voucher', ['1995-01-01','2000-12-31'])->sum('nilai');
        $sum200205 = NilaiAktiva::whereBetween('tgl_voucher', ['2000-01-01','2005-12-31'])->sum('nilai');
        $sum205210 = NilaiAktiva::whereBetween('tgl_voucher', ['2005-01-01','2010-12-31'])->sum('nilai');
        $sum210215 = NilaiAktiva::whereBetween('tgl_voucher', ['2010-01-01','2015-12-31'])->sum('nilai');
        $sum215220 = NilaiAktiva::whereBetween('tgl_voucher', ['2015-01-01','2020-12-31'])->sum('nilai');
        $sum220223 = NilaiAktiva::whereBetween('tgl_voucher', ['2020-01-01','2023-12-31'])->sum('nilai');

        return response()->json([

            'sum8085' => intval($sum8085),
            'sum8590'=> intval($sum8590),
            'sum9095'=> intval($sum9095),
            'sum9520'=> intval($sum9520),
            'sum200205' => intval($sum200205),
            'sum205210' => intval($sum205210),
            'sum210215' => intval($sum210215),
            'sum215220'=> intval($sum215220),
            'sum220223'=>intval($sum220223)

        ]);
    }

    public function jumlah()
    {
        $totalA = NilaiAktiva::where('cat',1)->count('id');
        $totalB = NilaiAktiva::where('cat',2)->count('id');
        $totalC = NilaiAktiva::where('cat',3)->count('id');

        return response()->json([
            'totalA' => $totalA,
            'totalB' => $totalB,
            'totalC' => $totalC
        ]);
    }

    public function marker()

    {
        $marker = lokasi::select('lat','long','lokasi','img')->get();
        return response()->json($marker);
    }


}
