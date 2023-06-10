<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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




Route::get('/transaksi', function () {
    return view('formTransaksi', [
        "title" => "Transaksi"
    ]);
});
/*
Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});
*/

//---------route landingpage-------
Route::get('/', function () {
    //return view('welcome');
    return view('landingpage.hero');
});
Route::get('/about', function () {
    return view('landingpage.about');
});
Route::get('/portfolio', function () {
    return view('landingpage.portfolio');
});
Route::get('/services', function () {
    return view('landingpage.services');
});
Route::get('/team', function () {
    return view('landingpage.team');
});
Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('datauser', [UserController::class, 'index'])->middleware('auth');

Route::get('/beranda', [BarangController::class, 'dataBahan'])->middleware('auth');


//----------route admin------------

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::resource('bahan', BahanController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
