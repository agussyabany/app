<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Webcontroller extends Controller
{
    public function index()

    {
        return view('admin.landingPage.pages.index');
    }
}
