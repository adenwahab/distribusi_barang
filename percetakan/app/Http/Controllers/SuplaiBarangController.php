<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuplaiBarang; //panggil model
use Illuminate\Support\Facades\DB; //
use App\Models\Suplier; //panggil model
use App\Models\Barang; //panggil model
use PDF;

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
        return view('suplaiBarang.form', compact('ar_suplier', 'ar_barang'), ['title' => 'Barang Masuk']);
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
                // 'kode'  => '',
            ],
            //custom pesan errornya
            [
                'jumlah.required' => 'Jumlah wajib diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
            ]
        );

        $selectedBarang = $request->input('barang');

        $dataBarang = explode(' | ', $selectedBarang);
        $idBarang = $dataBarang[1];

        $selectedSuplier = $request->input('suplier');
        $dataSuplier = explode(' | ', $selectedSuplier);
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
        // DB::table('barang')->where('id', $idBarang)->update(
        //     [
        //         'stok' => DB::raw('stok + ' . $request->jumlah),
        //     ]
        // );

        return redirect('/suplaibarang')
            ->with('pesan', 'Barang Masuk berhasil disimpan');
    }

    public function destroy($id)
    {
        SuplaiBarang::destroy($id);
        return redirect('/suplaibarang')
            ->with('pesan', 'Barang Masuk berhasil dihapus');
    }


    public function edit(string $id)
    {

        $ar_suplier = Suplier::all();
        $ar_barang = Barang::all();
        $row = SuplaiBarang::find($id);
        return view('suplaiBarang.form_edit', compact('ar_suplier', 'ar_barang', 'row'), ['title' => 'Edit Barang Masuk']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang' => 'required',
            'suplier' => 'required',
            'jumlah' => 'required|integer',
            'date' => 'required',
            'keterangan' => '',
        ], [
            'jumlah.required' => 'Jumlah wajib diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
        ]);

        $suplaiBarang = SuplaiBarang::find($id);

        if ($suplaiBarang) {
            $suplaiBarang->barang_id = $request->input('barang');
            $suplaiBarang->suplier_id = $request->input('suplier');
            $suplaiBarang->tgl = $request->input('date');
            $suplaiBarang->jumlah = $request->input('jumlah');
            $suplaiBarang->keterangan = $request->input('keterangan');
            $suplaiBarang->save();

            return redirect()->route('suplaibarang.show', $id)
                ->with('success', 'Data Suplai Berhasil Diubah');
        }

        return redirect()->back()
            ->with('error', 'Data Suplai tidak ditemukan');
    }

    public function show($id)
    {
        return redirect('/suplaibarang')
            ->with('error', 'Invalid request. Cannot access specific resource.');
    }

    public function deleteAll()
    {
        SuplaiBarang::truncate();
        return redirect('/suplaibarang')
            ->with('pesan', 'Data Suplai Berhasil Dihapus');
    }

    public function suplaibarangPDF()
    {
        $ar_suplai_barang = DB::table('suplai_barang')
            ->join('suplier', 'suplai_barang.suplier_id', '=', 'suplier.id')
            ->join('barang', 'suplai_barang.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('suplai_barang.*', 'suplier.nama as suplier', 'barang.nama_barang as barang', 'kategori.nama as kategori', 'barang.kode as kode',)
            ->orderBy('suplai_barang.id', 'desc')
            ->get();

        $pdf = PDF::loadView('suplaiBarang.suplaibarang_pdf', ['ar_suplai_barang' => $ar_suplai_barang]);
        return $pdf->download('Data_SuplaiBarang_' . date('d-m-Y') . '.pdf');
    }
}
