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
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SuplaiBarangController;
use App\Http\Controllers\UpdateLevelController;
use App\Http\Controllers\UpdatePasswordController;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

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

Route::resource('', LandingController::class);
Route::resource('categories', ProductCategoryController::class);

//---------route landingpage-------
Route::get('/about', function () {
    $ar_kategori = Kategori::all();
    return view('landingpage.about', compact('ar_kategori'));
});
Route::get('/portfolio', function () {
    $ar_kategori = Kategori::all();
    return view('landingpage.portfolio', compact('ar_kategori'));
});
Route::get('/services', function () {
    return view('landingpage.services');
});
Route::get('/team', function () {
    $ar_kategori = Kategori::all();
    return view('landingpage.team', compact('ar_kategori'));
});
Route::get('/contact', function () {
    $ar_kategori = Kategori::all();
    return view('landingpage.contact', compact('ar_kategori'));
});
Route::get('/ourbarang', function () {
    $ar_barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.nama as kategori')
            ->orderBy('barang.id', 'desc')
            ->get();

    $ar_kategori = Kategori::all();
    return view('landingpage.ourbarang', compact('ar_kategori', 'ar_barang'));
});

Route::get('datauser', [UserController::class, 'index'])->middleware('auth');

Route::get('/beranda', [BarangController::class, 'dataBahan'])->middleware('auth');


//---------route landingpage kategori-------
Route::get('/coworking', function () {
    return view('landingpage.kategori-prod.coworking');
});
Route::get('/foto', function () {
    return view('landingpage.kategori-prod.foto');
});
Route::get('/largform', function () {
    return view('landingpage.kategori-prod.largform');
});
Route::get('/marketing', function () {
    return view('landingpage.kategori-prod.marketing');
});
Route::get('/packaging', function () {
    return view('landingpage.kategori-prod.packaging');
});
Route::get('/printkain', function () {
    return view('landingpage.kategori-prod.printkain');
});
Route::get('/printlembar', function () {
    return view('landingpage.kategori-prod.printlembar');
});
Route::get('/printterior', function () {
    return view('landingpage.kategori-prod.printterior');
});
Route::get('/promo', function () {
    return view('landingpage.kategori-prod.promo');
});
Route::get('/signage', function () {
    return view('landingpage.kategori-prod.signage');
});
Route::get('/stationary', function () {
    return view('landingpage.kategori-prod.stationary');
});
Route::get('/umkm', function () {
    return view('landingpage.kategori-prod.umkm');
});

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
Route::resource('member', MemberController::class)->middleware('auth');
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
