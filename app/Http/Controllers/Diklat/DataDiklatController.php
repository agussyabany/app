<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataDiklatController extends Controller
{
    public function datadiklat()
    {
        $on=4;
        return view('diklat.pages.datadiklat',compact(['on']));
    }
}
