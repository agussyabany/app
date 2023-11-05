<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsetDashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.aset.dashboard');
    }
}
