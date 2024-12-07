<?php

namespace App\Http\Controllers\LiveLine\AdminKinerja;

use App\Http\Controllers\Controller;
use App\Models\liveline\kinerja\Administrasi;
use Illuminate\Http\Request;

class AdmAdminstrasiController extends Controller
{
    public function data ()
    {
        $on = 17;
        $no = 1;
        $adm = Administrasi::all();

        return view('Liveline.pages.adminKinerja.administrasi',compact(['adm','no','on']));
    }
}
