<?php

namespace App\Http\Controllers\Soc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Soccontroller extends Controller
{
    public function index()

    {
         return view('soc.pages.index');
    }
}
