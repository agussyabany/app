<?php

namespace App\Http\Controllers\Diklat\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Mobilecontroller extends Controller
{
    public function index ()
    {
        return view('diklat.mobile.pages.index');
    }
}
