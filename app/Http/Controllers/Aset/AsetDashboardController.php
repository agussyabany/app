<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Barang;
use Illuminate\Http\Request;

class AsetDashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.aset.dashboard');
    }

    public function barang()
    {
        $barang = Barang::orderBy('id','ASC')->get();
        return response()->json([
            'data' => $barang
          ]);
    }


}
