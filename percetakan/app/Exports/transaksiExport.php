<?php

namespace App\Exports;

use App\Models\transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_transaksi = DB::table('transaksi')
        ->join('barang', 'barang.id', '=', 'transaksi.barang_id')
        ->select('transaksi.*', 'barang.kode as barang')
        ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.pelanggan_id')
        ->select('transaksi.*', 'barang.nama_barang as barang', 'barang.kode as barang', 'barang.harga as barang',
        'barang.harga_member as barang', 'pelanggan.nama as pelanggan')
        ->orderBy('transaksi.id', 'desc')
        ->get();
        return $ar_transaksi;
    }
    public function headings(): array
    {
        return ["No","Kode Barang", "Nama Pelanggan", "Tanggal", "Jumlah", "Keterangan", "Total Harga"];
    }
}
