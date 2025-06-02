<?php

// use App\Http\Controllers\Aset\AsetController;

use App\Http\Controllers\Aset\ArsipController;
use App\Http\Controllers\Aset\AsetDashboardController;
use App\Http\Controllers\Aset\BahanController;
use App\Http\Controllers\Aset\BarangController;
use App\Http\Controllers\Aset\DepartemenController;
use App\Http\Controllers\Aset\Divisicontroller;
use App\Http\Controllers\Aset\GedungController;
use App\Http\Controllers\Aset\KibDController;
use App\Http\Controllers\Aset\KibEContrller;
use App\Http\Controllers\Aset\KibFController;
use App\Http\Controllers\Aset\KirController;
use App\Http\Controllers\Aset\LokasiController;
use App\Http\Controllers\Aset\MesinController;
use App\Http\Controllers\Aset\NilaiController;
use App\Http\Controllers\Aset\PdfController;
use App\Http\Controllers\Aset\RuangController;
use App\Http\Controllers\Aset\SdmController;
use App\Http\Controllers\Aset\TanahController;
use App\Http\Controllers\Aset\Webcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Diklat\DataDiklatController;
use App\Http\Controllers\Diklat\Diklatcontroller;
use App\Http\Controllers\Diklat\DivisiDiklatController;
use App\Http\Controllers\Diklat\Mobile\Mobilecontroller;
use App\Http\Controllers\Diklat\PegawaiController;
use App\Http\Controllers\Diklat\PemateriController;
use App\Http\Controllers\LiveLine\AdminKinerja\AdmAdminstrasiController;
use App\Http\Controllers\LiveLine\AdminKinerja\AdmKeuController;
use App\Http\Controllers\LiveLine\AdminKinerja\AdmOprsController;
use App\Http\Controllers\LiveLine\AdminKinerja\AdmPelController;
use App\Http\Controllers\LiveLine\AdminKinerja\AdmSdmController;
use App\Http\Controllers\LiveLine\KinerjaController;
use App\Http\Controllers\LiveLine\Llcontroller;
use App\Http\Controllers\LiveLine\RapatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Soc\Soccontroller;
use App\Models\Aset\KibD;
use GuzzleHttp\Middleware;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;


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

Route::get('/aset', function () {
    return redirect('/aset');
});

Route::get('/aset',[Webcontroller::class, 'index']);
Route::get('/nilai.dashboard',[Webcontroller::class, 'nilai']);
Route::get('/jumlah.dashboard',[Webcontroller::class, 'jumlah']);
Route::get('/marker',[Webcontroller::class, 'marker']);
Route::get('/struktur',[Webcontroller::class, 'struktur']);
Route::get('/direksi/{id}',[Webcontroller::class, 'direksi']);

Route::get('/dashboard', function () {
    return redirect('/aset');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//SISTEM INFORMASI ASET
Route::middleware('auth','verified','role:aset')->group(function () {
    Route::get('/', function () {
        return redirect('/barangs');
    });


    Route::get('/aset.dashboard',[AsetDashboardController::class, 'index']);
    Route::get('/barangs',[AsetDashboardController::class, 'barangs']);
    Route::get('/depts',[AsetDashboardController::class, 'depts']);
    Route::get('/divs',[AsetDashboardController::class, 'divs']);
    Route::get('/ruangs',[AsetDashboardController::class, 'ruangs']);
    Route::get('/sumber',[AsetDashboardController::class, 'sumber']);
    Route::get('/lokasis',[AsetDashboardController::class, 'lokasis']);
    Route::get('/bahans',[AsetDashboardController::class, 'bahans']);
    Route::get('/aktivas',[AsetDashboardController::class, 'aktivas']);
    Route::get('/barang',[AsetDashboardController::class, 'barang']);
    Route::get('/departemen',[AsetDashboardController::class, 'departemen']);
    Route::get('/divisi',[AsetDashboardController::class, 'divisi']);
    Route::get('/div.dep/{id}',[AsetDashboardController::class, 'divDep']);
    Route::get('/ruang',[AsetDashboardController::class, 'ruang']);
    Route::get('/sdm',[AsetDashboardController::class, 'sdm']);
    Route::get('/lok',[AsetDashboardController::class, 'lokasi']);
    Route::get('/bahan',[AsetDashboardController::class, 'bahan']);
    Route::get('/aktiva',[AsetDashboardController::class, 'aktiva']);
    Route::get('/nilai',[AsetDashboardController::class, 'nilaiView']);
    Route::get('/nilai/data', [AsetDashboardController::class, 'nilaiData']);
    Route::get('/arsip',[AsetDashboardController::class, 'arsip']);


    Route::get('/tanah',[AsetDashboardController::class,'tanah']);
    Route::get('/mesin',[AsetDashboardController::class,'mesin']);
    Route::get('/gedung',[AsetDashboardController::class,'gedung']);
    Route::get('/kibd',[AsetDashboardController::class,'kibD']);
    Route::get('/kibe',[AsetDashboardController::class,'kibE']);
    Route::get('/kibf',[AsetDashboardController::class,'kibF']);
    Route::get('/kir',[AsetDashboardController::class,'kir']);


    Route::post('/barang.save',[BarangController::class,'save']);
    Route::get('barang.edit/{id}',[BarangController::class,'edit']);
    Route::post('/barang.update',[BarangController::class,'update']);
    Route::post('barang.hapus/{id}',[BarangController::class,'destroy']);
    Route::delete('barang.hapus/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('barang.tanah',[BarangController::class,'tanah']);
    Route::get('barang.mesin',[BarangController::class,'mesin']);
    Route::get('barang.gedung',[BarangController::class,'gedung']);
    Route::get('barang.kir',[BarangController::class,'kir']);
    Route::get('kode.kir/{id}',[BarangController::class,'kode_kir']);

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

    Route::post('/nilai.save',[NilaiController::class,'save']);
    Route::get('nilai.edit/{id}',[NilaiController::class,'edit']);
    Route::post('nilai.update',[NilaiController::class,'update']);
    Route::post('nilai.hapus/{id}',[NilaiController::class,'destroy']);

    Route::get('/show/{id}',[PdfController::class,'show']);

    Route::post('/tanah.save',[TanahController::class,'save']);
    Route::get('/tanah.detail/{id}',[TanahController::class,'detail']);
    Route::get('/tanah.print',[TanahController::class,'print']);
    Route::get('/tanah.nilai/{lok}',[TanahController::class,'nilaiSum']);
    Route::get('/nilaiTanah.detail/{id}',[TanahController::class,'nilaiTanah']);
    Route::get('/vTanah',[TanahController::class,'vTanah']);

    Route::get('/mesin.dep/{id}',[MesinController::class,'dep']);
    Route::get('/mesin.div/{dep}/{lok}',[MesinController::class,'div']);
    Route::get('/mesin.show/{lok}/{dep}/{div}',[MesinController::class,'show']);
    Route::get('/mesin.detail/{id}',[MesinController::class,'detail']);
    Route::get('/mesin.edit/{id}',[MesinController::class,'edit']);
    Route::post('/mesin.save',[MesinController::class,'save']);
    Route::get('/mesin.input',[MesinController::class,'input']);
    Route::post('/mesin.clear',[MesinController::class,'clear']);
    Route::post('/mesin.hapus/{id}',[MesinController::class,'hapus']);
    Route::post('/mesin.update',[MesinController::class,'update']);
    Route::get('/mesin.print/{lok}/{dep}/{div}',[MesinController::class,'print']);
    Route::get('/mesin.nilai/{lok}',[MesinController::class,'nilaiSum']);
    Route::get('/nilaiMesin.detail/{id}',[MesinController::class,'nilaimesin']);
    Route::get('/vMesin',[MesinController::class,'vMesin']);

    Route::get('/gedung.dep/{id}',[GedungController::class,'dep']);
    Route::get('/gedung.div/{dep}/{lok}',[GedungController::class,'div']);
    Route::get('/gedung.show/{lok}/{dep}/{div}',[GedungController::class,'show']);
    Route::get('/gedung.detail/{id}',[GedungController::class,'detail']);
    Route::get('/gedung.print/{lok}/{dep}/{div}',[GedungController::class,'print']);
    Route::get('/gedung.nilai/{lok}',[GedungController::class,'nilaiSum']);
    Route::get('/nilaiGedung.detail/{id}',[GedungController::class,'nilaigedung']);

    Route::get('/nilaiD/{id}',[KibDController::class,'nilaiD']);
    Route::get('/d.dep/{id}',[KibDController::class,'dep']);
    Route::get('/d.div/{dep}/{lok}',[KibDController::class,'div']);
    Route::get('/d.show/{lok}/{dep}/{div}',[KibDController::class,'show']);
    Route::get('/d.detail/{id}',[KibDController::class,'detail']);

    Route::get('/nlaiE/{id}',[KibEContrller::class,'nilaiE']);
    Route::get('/e.dep/{id}',[KibEContrller::class,'dep']);
    Route::get('/e.div/{dep}/{lok}',[KibEContrller::class,'div' ]);
    Route::get('/e.show/{lok}/{dep}/{div}',[KibEContrller::class,'show']);
    Route::get('/e.detail/{id}',[KibEContrller::class,'detail']);

    Route::get('/f.dep/{id}',[KibFController::class,'dep']);
    Route::get('/f.div/{dep}/{lok}',[KibFController::class,'div']);
    Route::get('/f.show/{lok}/{dep}/{div}',[KibFController::class,'show']);
    Route::get('/f.detail/{id}',[KibFController::class,'detail']);



    Route::get('/kir.dep/{id}',[KirController::class,'dep']);
    Route::get('/kir.div/{dep}/{lok}',[KirController::class,'div']);
    Route::get('/kir.gedung/{lok}/{dep}/{div}',[KirController::class,'gedung']);
    Route::get('/kir.ruang/{lok}/{dep}/{div}/{ged}',[KirController::class,'ruang']);
    Route::get('/kir.detail/{lok}/{dep}/{div}/{ged}/{ruang}',[KirController::class,'detail']);
    Route::get('/opsi.gedung',[KirController::class,'opsi']);
    Route::post('/kir.save',[KirController::class,'save']);
    Route::get('/kir.input',[KirController::class,'input']);
    Route::post('/kir.clear',[KirController::class,'clear']);
    Route::get('/kir.print/{lok}/{dep}/{div}/{ged}/{ruang}/{prnt}',[KirController::class,'print']);
    Route::get('/kir.nilai/{loks}',[KirController::class,'nilaiSum']);
    Route::get('/nilaiKir.detail/{id}',[KirController::class,'nilaikir']);
    Route::post('/kir.del/{id}',[KirController::class,'del']);
    Route::get('/voucher.kir',[KirController::class,'voucher']);
    Route::get('/v_kir',[KirController::class,'v_kir']);
    Route::get('/kir_aktiva/{idv}',[KirController::class,'kir_aktiva']);
    Route::get('/kir_tgl/{id}',[KirController::class,'kir_tgl']);
    Route::get('/kir.edit/{id}',[KirController::class,'edit']);
    Route::post('/kir.update',[KirController::class,'update']);
    Route::post('/kir.imgUpd/{id}', [KirController::class, 'Imgupdate']);

    Route::get('/arsip.fill/{id}',[ArsipController::class,'fill']);
    Route::get('/arsip.rak/{gd}',[ArsipController::class,'rak']);
    Route::get('/arsip.detail/{gd}/{fil}/{rak}',[ArsipController::class,'detail']);
    Route::get('/arsip.isi/{id}',[ArsipController::class,'isi']);


});



// SISTEM INFORAMSI SOC
Route::middleware('auth','verified','role:soc')->group(function () {
    Route::get('/', function () {
        return redirect('/soc.dashboard');
    });
    Route::get('/soc.dashboard',[Soccontroller::class, 'index']);
});
//END OF SISTEM INFORMASI SOC


//LIVE LINE DASHBOARD
Route::middleware('auth','verified','role:LiveLine')->group(function () {
    Route::get('/', function () {
        return redirect('/ll.dashboard');
    });
    Route::get('/ll.dashboard',[Llcontroller::class, 'index']);
    Route::get('/donut',[Llcontroller::class, 'donut']);
    Route::get('/bar',[Llcontroller::class, 'bar']);
    Route::get('/test',[Llcontroller::class, 'test']);
    //Route::get('/nilai',[Llcontroller::class, 'nilai']);
    Route::get('/donut.duo',[Llcontroller::class,'donutTwo']);

    //UMUM
    Route::get('/rapat',[RapatController::class, 'index']);
    Route::post('/rapat.save',[RapatController::class,'save']);
});
// END OF LIVE LINE DASHBOARD


Route::get('/perumdam',[KinerjaController::class, 'kinerja']);
Route::get('/keuangan',[KinerjaController::class, 'keuangan']);
Route::get('/operasional',[KinerjaController::class, 'operasional']);
Route::get('/pelayanan',[KinerjaController::class, 'pelayanan']);
Route::get('/sdmkin',[KinerjaController::class, 'sdm']);
Route::get('/utama',[KinerjaController::class, 'utama']);

Route::get('/nrw',[AdmOprsController::class, 'nrw']);
Route::get('/chartNrw',[AdmOprsController::class, 'chartNrw']);
Route::get('/cakupan',[AdmPelController::class, 'cakupan']);
Route::get('/laba',[AdmKeuController::class, 'laba']);




Route::middleware('auth','verified','permission:edit-LiveLine')->group(function () {
    Route::get('/', function () {
        return redirect('/utama');
    });

    Route::get('/aKeuangan',[AdmKeuController::class, 'data']);
    Route::post('/keuSave',[AdmKeuController::class, 'save']);
    Route::get('/dataKeuBy/{id}',[AdmKeuController::class, 'dataKeuBy']);
    Route::post('/keuEdit',[AdmKeuController::class, 'edit']);
    Route::post('/delKeu/{id}',[AdmKeuController::class, 'del']);

    Route::get('/aOperasional',[AdmOprsController::class, 'data']);
    Route::post('/opSave',[AdmOprsController::class, 'save']);
    Route::get('/dataOpBy/{id}',[AdmOprsController::class, 'dataOpBy']);
    Route::post('/opEdit',[AdmOprsController::class, 'edit']);
    Route::post('/delOps/{id}',[AdmOprsController::class, 'del']);

    Route::get('/aPelayanan',[AdmPelController::class, 'data']);
    Route::post('/pelSave',[AdmPelController::class, 'save']);
    Route::get('/dataPelBy/{id}',[AdmPelController::class, 'dataOpBy']);
    Route::post('/pelEdit',[AdmPelController::class, 'edit']);
    Route::post('/delPel/{id}',[AdmPelController::class, 'del']);

    Route::get('/aSdm',[AdmSdmController::class, 'data']);
    Route::post('/sdmSave',[AdmSdmController::class, 'save']);
    Route::get('/dataSdmBy/{id}',[AdmSdmController::class, 'dataSdmBy']);
    Route::post('/sdmEdit',[AdmSdmController::class, 'edit']);
    Route::post('/delSdm/{id}',[AdmSdmController::class, 'del']);

    Route::get('/aAdm',[AdmAdminstrasiController::class, 'data']);


});

// Route::get('admin',function (){
//     return '<h1>Hello Admin<h1>';
// })->middleware('auth','verified','role:admin');





require __DIR__.'/auth.php';
