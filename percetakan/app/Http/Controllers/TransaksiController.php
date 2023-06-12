<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    //
    
    function show(){
        $data=Transaksi::with('pelanggan')->get();
        return view('transaksitable',compact('data'),['title' => 'Tabel Transaksi']);
    }
}
