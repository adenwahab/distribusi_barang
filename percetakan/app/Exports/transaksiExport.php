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
        return transaksi::all();
    }
    public function headings(): array
    {
        return ["No","Kode Barang", "ID Barang", "ID Pelanggan","Tanggal","Jumlah","Keterangan"];
    }
}
