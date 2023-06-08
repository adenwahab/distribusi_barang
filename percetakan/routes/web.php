<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TransaksiController;

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


Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
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


Route::get('/beranda', [BarangController::class, 'dataBahan']);


//----------route admin------------

Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('bahan', BahanController::class);

//login and logut
// Route::get('/login', function () {
//     return view('login', [
//         "title" => "Login"
//     ]);
// });
Route::get('/login', [loginController::class, 'login']);
Route::post('/login', [loginController::class, 'authenticate']);


// routes transaksi //


Route::get('/transaksi', function () {
    return view('formTransaksi', [
        "title" => "Transaksi"
    ]);
});

Route::get('transaksitable',[TransaksiController::class,'show']);