<?php

// use App\Http\Controllers\Aset\AsetController;

use App\Http\Controllers\Aset\AsetDashboardController;
use App\Http\Controllers\Aset\BarangController;
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



    Route::post('/barang.save',[BarangController::class,'save']);
    Route::get('barang.edit/{id}',[BarangController::class,'edit']);
    Route::post('barang.update',[BarangController::class,'update']);
    Route::post('barang.hapus/{id}',[BarangController::class,'destroy']);

});




require __DIR__.'/auth.php';
