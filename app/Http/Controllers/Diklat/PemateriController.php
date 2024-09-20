<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemateriController extends Controller
{
    public function pemateri(){

        $on=2;
        return view('diklat.pages.pemateri',compact(['on']));
    }
}
