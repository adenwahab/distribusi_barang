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
            ->select('transaksi.*', 'barang.kode as barang')
            ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.pelanggan_id')
            ->select('transaksi.*', 'pelanggan.id as pelanggan')
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
        $ar_barang = barang::all();
        //arahkan ke form input data
        return view('transaksi.form', compact('ar_barang'), ['title' => 'Input Transaksi Baru']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input barang dari form
        $request->validate(
            [
                'kode' => 'required|max:5',
                'barang_id' => 'required|integer',
                'pelanggan_id' => 'required|integer',
                'tanggal' => 'required|datetime',
                'jumlah' => 'required|max:45',
                'status_member' => 'required|max:100',
            ]

        );

        //lakukan insert data dari request form
        DB::table('transaksi')->insert(
            [
                'kode' => $request->kode,
                'barang_id' => $request->barang,
                'pelanggan_id' => $request->pelanggan,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                //'updated_at'=>now(),
            ]
        );

        return redirect()->route('transaksi.index')
            ->with('success', 'Data Transaksi Baru Berhasil Disimpan');
    }
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_barang = barang::all();
        //tampilkan data lama di form
        $row = transaksi::find($id);
        return view('transaksi.form_edit', compact('row', 'ar_barang'), ['title' => 'Edit Data Transaksi']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input barang dari form
        $request->validate(
            [
                'kode' => 'required|max:5',
                'barang_id' => 'required|integer',
                'pelanggan_id' => 'required|integer',
                'tanggal' => 'required|datetime',
                'jumlah' => 'required|max:45',
                'status_member' => 'required|max:100',
            ]
        );

        //lakukan update data dari request form edit
        DB::table('transaksi')->where('id', $id)->update(
            [
                'kode' => $request->kode,
                'barang_id' => $request->barang,
                'pelanggan_id' => $request->pelanggan,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                //'updated_at'=>now(),
            ]
        );

        return redirect('/transaksi' . '/' . $id)
            ->with('success', 'Data Transaksi Berhasil Diubah');
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
            ->select('transaksi.*', 'pelanggan.id as pelanggan')
            ->orderBy('transaksi.id', 'desc')
            ->get();

        return view('transaksi.index', compact('ar_transaksi'), ['title' => 'Data Transaksi']);
    }
    public function transaksiPDF()
    {
        $ar_transaksi = Transaksi::all(); //eloquent
        $pdf = PDF::loadView('transaksi.transaksi_pdf', ['ar_transaksi' => $ar_transaksi]);
        return $pdf->download('data_transaksi_' . date('d-m-Y') . '.pdf');
    }
    public function transaksiExcel()
    {
        return Excel::download(new transaksiExport, 'data_transaksi_' . date('d-m-Y') . '.xlsx');

    }
}
