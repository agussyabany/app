<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $on=1;
        return view('diklat.pages.pegawai',compact(['on']));
    }

    
}
 