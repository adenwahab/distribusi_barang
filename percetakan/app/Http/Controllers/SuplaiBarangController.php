<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SuplaiBarangController extends Controller
{
    public function index()
    {
        $ar_suplai_barang = DB::table('suplai_barang')
            ->join('suplier', 'suplai_barang.suplier_id', '=', 'suplier.id')
            ->join('barang', 'suplai_barang.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('suplai_barang.*', 'suplier.nama as suplier', 'barang.nama_barang as barang', 'kategori.nama as kategori', 'barang.kode as kode',)
            ->orderBy('suplai_barang.id', 'desc')
            ->get();

        return view('suplaiBarang.index', compact('ar_suplai_barang'), ['title' => 'Barang Masuk']);
    }

    public function create()
    {
        $ar_suplier = DB::table('suplier')
            ->orderBy('suplier.id', 'desc')
            ->get();
        $ar_barang = DB::table('barang')
            ->orderBy('barang.id', 'desc')
            ->get();
        return view('suplaibarang.form', compact('ar_suplier', 'ar_barang'), ['title' => 'suplier']);
    }

    public function store(Request $request)
    {
        //proses input suplier dari form
        $request->validate(
            [
                'barang' => 'required',
                'suplier' => 'required',
                'jumlah' => 'required|integer',
                'date' => 'required|date',
                'kode'  => '',
            ],
            //custom pesan errornya
            [
                'jumlah.required' => 'Jumlah wajib diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
            ]
        );

        $selectedBarang = $request->input('barang');
        $quantity = $request->input('stok');

        $dataBarang = explode(' | ', $selectedBarang);
        $idBarang = $dataBarang[2];

        $dataSuplier = explode(' | ', $request->input('suplier'));
        $idSuplier = $dataSuplier[1];


        DB::table('suplai_barang')->insert(
            [
                'suplier_id' => $idSuplier,
                'barang_id' => $idBarang,
                'tgl' => $request->date,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
            ]
        );

        return redirect('/suplaibarang')->with('pesan', 'Barang Masuk berhasil disimpan');
    }
}
