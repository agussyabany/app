<?php

namespace App\Http\Controllers\Diklat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Diklatcontroller extends Controller
{
    public function index()

    {
         return view('diklat.pages.dashboard');
    }
}
