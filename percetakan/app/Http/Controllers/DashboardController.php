<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent

class DashboardController extends Controller
{
        public function index()
        {
                //query untuk grafik stok barang (bar chart)
                $ar_stok = DB::table('barang')
                        ->select('nama_barang', 'stok')
                        ->get();

                //query untuk menampilkan jumlah barang per kategori (pie chart)
                $ar_jumlah = DB::table('barang')
                        ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
                        ->selectRaw('kategori.nama, count(barang.kategori_id) as jumlah')
                        ->groupBy('kategori.nama')
                        ->get();

                //query untuk grafik pelanggan
                $jml_pelanggan = DB::table('pelanggan')
                        ->selectRaw('count(*) as jumlah')
                        ->get();

                //query untuk grafik pelanggan
                $jml_transaksi = DB::table('transaksi')
                        ->selectRaw('count(*) as jumlah')
                        ->get();

                $jml_pendapatan = DB::table('transaksi')
                ->selectRaw('SUM(total_harga) as jumlah')
                ->get();



                return view('dashboard.index', compact('ar_stok', 'ar_jumlah', 'jml_pelanggan', 'jml_transaksi','jml_pendapatan'), ['title' => 'Dashboard']);
        }
}
