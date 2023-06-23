<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;



use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\SuplaiBarangController;
use App\Http\Controllers\UpdateLevelController;
use App\Http\Controllers\UpdatePasswordController;

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

Route::get('transaksitable', [TransaksiController::class, 'show']);

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::resource('suplier', SuplierController::class)->middleware('auth');
Route::resource('bahan', BahanController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
Route::resource('updatelevel', UpdateLevelController::class)->middleware('auth');
Route::resource('suplaibarang', SuplaiBarangController::class)->middleware('auth');
Route::delete('/suplaibarang/deleteAll', [SuplaiBarangController::class, 'deleteAll']);
Route::get('/transaksi-pdf', [TransaksiController::class, 'transaksiPDF']);
Route::get('/suplaibarang-pdf', [SuplaiBarangController::class, 'suplaibarangPDF']);
Route::get('/transaksi-excel', [TransaksiController::class, 'transaksiExcel']);
Route::get('/account/settings', [AccountSettingController::class, 'index'])->name('user.setting');
Route::put('/account/settings', [AccountSettingController::class, 'update'])->name('user.setting.update');
Route::get('/account/settings/updatePassword', [UpdatePasswordController::class, 'index'])->name('user.settingpassword');
Route::put('/account/settings/updatePassword', [UpdatePasswordController::class, 'update'])->name('user.settingpassword.update');


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
