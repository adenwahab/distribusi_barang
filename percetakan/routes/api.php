<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\Api\PelangganController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api-barang',[barangController::class,'apiBarang']);
Route::get('/api-barang/{id}',[barangController::class,'apiBarangDetail']);

Route::get('/pelanggan',[PelangganController::class,'index']);
Route::get('/pelanggan/{id}',[PelangganController::class,'show']);
Route::post('/pelanggan-create',[PelangganController::class,'store']);
