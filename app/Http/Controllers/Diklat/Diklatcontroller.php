<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Diklatcontroller extends Controller
{
    public function index()

    {
        $on=0;
         return view('diklat.pages.index',compact(['on']));
         
    }
}
