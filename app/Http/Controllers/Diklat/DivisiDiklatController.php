<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisiDiklatController extends Controller
{
    public function divisidiklat()
    {
        $on=3;
        return view('diklat.pages.divisidiklat',compact(['on']));
    }
}

