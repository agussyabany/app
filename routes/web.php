<?php

// use App\Http\Controllers\Aset\AsetController;

use App\Http\Controllers\Aset\AsetDashboardController;
use App\Http\Controllers\Aset\BahanController;
use App\Http\Controllers\Aset\BarangController;
use App\Http\Controllers\Aset\DepartemenController;
use App\Http\Controllers\Aset\Divisicontroller;
use App\Http\Controllers\Aset\LokasiController;
use App\Http\Controllers\Aset\RuangController;
use App\Http\Controllers\Aset\SdmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin',function (){
    return '<h1>Hello Admin<h1>';
})->middleware('auth','verified','role:admin');



Route::middleware('auth','verified','role:aset')->group(function () {
    Route::get('/', function () {
        return redirect('/aset.dashboard');
    });
    Route::get('/aset.dashboard',[AsetDashboardController::class, 'index']);
    Route::get('/barang',[AsetDashboardController::class, 'barang']);
    Route::get('/departemen',[AsetDashboardController::class, 'departemen']);
    Route::get('/divisi',[AsetDashboardController::class, 'divisi']);
    Route::get('/ruang',[AsetDashboardController::class, 'ruang']);
    Route::get('/sdm',[AsetDashboardController::class, 'sdm']);
    Route::get('/lok',[AsetDashboardController::class, 'lokasi']);
    Route::get('/bahan',[AsetDashboardController::class, 'bahan']);



    Route::post('/barang.save',[BarangController::class,'save']);
    Route::get('barang.edit/{id}',[BarangController::class,'edit']);
    Route::post('barang.update',[BarangController::class,'update']);
    Route::post('barang.hapus/{id}',[BarangController::class,'destroy']);


    Route::post('/dep.save',[DepartemenController::class,'save']);
    Route::get('dep.edit/{id}',[DepartemenController::class,'edit']);
    Route::post('dep.update',[DepartemenController::class,'update']);
    Route::post('dep.hapus/{id}',[DepartemenController::class,'destroy']);

    Route::post('/div.save',[Divisicontroller::class,'save']);
    Route::get('div.edit/{id}',[Divisicontroller::class,'edit']);
    Route::post('div.update',[Divisicontroller::class,'update']);
    Route::post('div.hapus/{id}',[Divisicontroller::class,'destroy']);

    Route::post('/ruang.save',[RuangController::class,'save']);
    Route::get('ruang.edit/{id}',[RuangController::class,'edit']);
    Route::post('ruang.update',[RuangController::class,'update']);
    Route::post('ruang.hapus/{id}',[RuangController::class,'destroy']);

    Route::post('/sdm.save',[SdmController::class,'save']);
    Route::get('sdm.edit/{id}',[SdmController::class,'edit']);
    Route::post('sdm.update',[SdmController::class,'update']);
    Route::post('sdm.hapus/{id}',[SdmController::class,'destroy']);

    Route::post('/lok.save',[LokasiController::class,'save']);
    Route::get('lok.edit/{id}',[LokasiController::class,'edit']);
    Route::post('lok.update',[LokasiController::class,'update']);
    Route::post('lok.hapus/{id}',[LokasiController::class,'destroy']);

    Route::post('/bahan.save',[BahanController::class,'save']);
    Route::get('bahan.edit/{id}',[BahanController::class,'edit']);
    Route::post('bahan.update',[BahanController::class,'update']);
    Route::post('bahan.hapus/{id}',[BahanController::class,'destroy']);

});




require __DIR__.'/auth.php';
