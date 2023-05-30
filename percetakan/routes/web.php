<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;


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

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/transaksi', function () {
    return view('formTransaksi');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

//---------route landingpage-------
Route::get('/', function () {
    //return view('welcome');
    return view('landingpage.hero');
});
Route::get('/beranda', function () {
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


Route::get('/', [BarangController::class, 'dataBahan']);
Route::get('/beranda', [BarangController::class, 'dataBahan']);


//----------route admin------------
Route::get('/home', function () {
    return view('admin.home');
});

Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('bahan', BahanController::class);
