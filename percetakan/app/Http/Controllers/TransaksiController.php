<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Barang; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use PDF;
use App\Exports\transaksiExport;
use Maatwebsite\Excel\Facades\Excel;



class TransaksiController extends Controller
{


    public function index()
    {
        $ar_transaksi = DB::table('transaksi')
            ->join('barang', 'barang.id', '=', 'transaksi.barang_id')
            ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.pelanggan_id')
            ->select('transaksi.*', 'barang.kode as kode', 'barang.nama_barang as barang', 'pelanggan.nama as pelanggan', 'pelanggan.status_member as status')
            // ->select('pelanggan.status_member as status', 'barang.nama_barang as barang')
            ->orderBy('transaksi.id', 'desc')
            ->get();

        return view('transaksi.index', compact('ar_transaksi'), ['title' => 'Data Transaksi']);
    }
    public function dataTerpilih()
    {
        $ar_transaksi = transaksi::all(); //eloquent
        return view('landingpage.hero', compact('ar_terpilih'));
    }
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_barang = DB::table('barang')
            ->orderBy('barang.id', 'desc')
            ->get();
        $ar_pelanggan = DB::table('pelanggan')
            ->orderBy('pelanggan.id', 'desc')
            ->get();
        //arahkan ke form input data
        return view('transaksi.form', compact('ar_barang', 'ar_pelanggan'), ['title' => 'Input Transaksi Baru']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input barang dari form
        $request->validate([
            'tgl' => 'required|date',
            'jumlah' => 'required|integer',
            'keterangan' => '',
            'total_harga' => '',
        ]);


        $selectedBarang = $request->input('barang');
        $dataBarang = explode(' | ', $selectedBarang);

        $idBarang = $dataBarang[0];
        $hargaBarang = $dataBarang[1];
        $hargaMember = $dataBarang[2];

        if ($hargaMember == 0) {
            $hargaMember = $hargaBarang;
        }

        $selectedPelanggan = $request->input('nama');
        $dataPelanggan = explode(' | ', $selectedPelanggan);

        $idPelanggan = $dataPelanggan[0];
        $statusMember = $dataPelanggan[1];

        if ($statusMember) {
            $total = $hargaMember * $request->jumlah;
        } else {
            $total = $hargaBarang * $request->jumlah;
        }

        DB::table('transaksi')->insert([
            'pelanggan_id' => $idPelanggan,
            'barang_id' => $idBarang,
            'tgl' => $request->tgl,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
            'keterangan' => $request->keterangan,
        ]);
        // DB::table('barang')->where('id', $idBarang)->update(
        //     [
        //         'stok' => DB::raw('stok + ' . $request->jumlah),
        //     ]
        // );
        return redirect('transaksi')
            ->with('pesan', 'Barang Masuk berhasil disimpan');
    }
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_barang = DB::table('barang')
            ->orderBy('barang.id', 'desc')
            ->get();
        //$ar_pelanggan = pelanggan::all();
        $ar_pelanggan = DB::table('pelanggan')
            ->orderBy('pelanggan.id', 'desc')
            ->get();
        //tampilkan data lama di form
        $row = transaksi::find($id);
        return view('transaksi.form_edit', compact('row', 'ar_barang', 'ar_pelanggan'), ['title' => 'Edit Data Transaksi']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input barang dari form
        $request->validate([
            'tgl' => 'required|date',
            'jumlah' => 'required|integer',
            'keterangan' => '',
            'total_harga' => '',
        ]);

        //lakukan update data dari request form edit
        $transaksi = transaksi::find($id);

        $selectedBarang = $request->input('barang');
        $dataBarang = explode(' | ', $selectedBarang);

        $idBarang = $dataBarang[0]; //id
        // $hargaBarang = $dataBarang[1]; //harga
        // $hargaMember = $dataBarang[2]; //harga_member

        // if (is_null($hargaMember)) {
        //     $hargaMember = $hargaBarang;
        // }

        $selectedPelanggan = $request->input('pelanggan');
        $dataPelanggan = explode(' | ', $selectedPelanggan);

        $idPelanggan = $dataPelanggan[0];
        // $statusMember = $dataPelanggan[1];

        // if ($hargaBarang) {
        //     $total = $hargaBarang * $request->jumlah;
        // }

        // if ($statusMember) {
        //     $total = $hargaMember * $request->jumlah;
        // } else {
        //     $total = $hargaBarang * $request->jumlah;
        // }

        // if ($transaksi) {
        //     $transaksi->pelanggan_id = $idPelanggan;
        //     $transaksi->barang_id = $idBarang;
        //     $transaksi->tgl = $request->input('tgl');
        //     $transaksi->jumlah = $request->input('jumlah');
        //     $transaksi->total_harga = $request->input('total_harga');
        //     $transaksi->keterangan = $request->input('keterangan');
        //     $transaksi->save();

        DB::table('transaksi')->where('id', $id)->update([
            'pelanggan_id' => $idPelanggan,
            'barang_id' => $idBarang,
            'tgl' => $request->tgl,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.show', $id)
            ->with('success', 'Data Transaksi Berhasil Diubah');
    }
    //     return redirect()->back()
    //         ->with('error', 'Data Transaksi tidak ditemukan');
    // }
    public function show($id)
    {

        return redirect('/transaksi')->with('error', 'Invalid request. Cannot access specific resource.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data di database
        transaksi::where('id', $id)->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'Data Transaksi Berhasil Dihapus');
    }

    public function batal()
    {
        $ar_transaksi = DB::table('transaksi')
            ->join('barang', 'barang.id', '=', 'transaksi.barang_id')
            ->select('transaksi.*', 'barang.kode as barang')
            ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.pelanggan_id')
            ->select('transaksi.*', 'barang.nama_barang as barang', 'barang.kode as kode', 'pelanggan.nama as pelanggan')
            ->orderBy('transaksi.id', 'desc')
            ->get();

        return view('transaksi.index', compact('ar_transaksi'), ['title' => 'Data Transaksi']);
    }
    public function transaksiPDF()
    {
        //$ar_transaksi = Transaksi::all(); //eloquent
        $ar_transaksi = DB::table('transaksi')
            ->join('barang', 'barang.id', '=', 'transaksi.barang_id')
            ->select('transaksi.*', 'barang.kode as barang')
            ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.pelanggan_id')
            ->select('transaksi.*', 'barang.nama_barang as barang', 'barang.kode as barang', 'pelanggan.nama as pelanggan', 'pelanggan.status_member as status')
            ->orderBy('transaksi.id', 'desc')
            ->get();

        $pdf = PDF::loadView('transaksi.transaksi_pdf', ['ar_transaksi' => $ar_transaksi]);
        return $pdf->download('Data_Transaksi_' . date('d-m-Y') . '.pdf');
    }
    public function transaksiExcel()
    {
        return Excel::download(new transaksiExport, 'data_transaksi_' . date('d-m-Y') . '.xlsx');
    }
}
