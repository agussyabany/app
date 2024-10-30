<?php

namespace App\Http\Controllers\LiveLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function utama ()
    {
        return view('Liveline.pages.kinerja');
    }
    public function kinerja ()
    {
        return view('Liveline.pages.kinerja.home');
    }

    public function keuangan ()
    {
        return view('Liveline.pages.kinerja.keuangan');
    }

    public function operasional ()
    {
        return view('Liveline.pages.kinerja.operasional');
    }

    public function pelayanan ()
    {
        return view('Liveline.pages.kinerja.pelayanan');
    }

    public function sdm ()
    {
        return view('Liveline.pages.kinerja.sdm');
    }
}
