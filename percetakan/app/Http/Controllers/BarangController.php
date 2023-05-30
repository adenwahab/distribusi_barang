<?php

namespace App\Http\Controllers;

use App\Models\Barang; //panggil model
use App\Models\kategori; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$ar_barang = barang::all(); //eloquent
        $ar_barang = DB::table('barang')
                ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
                ->select('barang.*', 'kategori.nama as kategori')
                ->orderBy('barang.id', 'desc')
                ->get();

        return view('barang.index',compact('ar_barang'));
    }

    public function dataBahan()
    {
        $ar_bahan = barang::all(); //eloquent
        return view('landingpage.hero',compact('ar_bahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = kategori::all();
        //arahkan ke form input data
        return view('barang.form',compact('ar_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input barang dari form
        $request->validate([
            'kode' => 'required|unique:barang|max:5',
            'nama_barang' => 'required|max:45',
            //'harga' => 'required|double',
            'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'stok' => 'required|integer',
            'satuan' => 'required|max:45',
            'kategori' => 'required|integer',
            'foto' => 'nullable|max:45',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.unique'=>'Kode Sudah Ada (Terduplikasi)',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'nama_barang.required'=>'Nama Wajib Diisi',
            'nama_barang.max'=>'Nama Maksimal 45 karakter',
            'harga.required'=>'Harga Wajib Diisi',
            'harga.regex'=>'Harga Harus Berupa Angka',
            'stok.required'=>'Stok Wajib Diisi',
            'stok.integer'=>'Stok Harus Berupa Angka',
            'satuan.required'=>'satuan Wajib Diisi',
            'satuan.max'=>'satuan Maksimal 45 karakter',
            'kategori_id.required'=>'kategori barang Wajib Diisi',
            'kategori_id.integer'=>'kategori barang Wajib Diisi Berupa dari Pilihan yg Tersedia',
        ]
        );
        //barang::create($request->all());

        //lakukan insert data dari request form
        DB::table('barang')->insert(
            [
                'kode'=>$request->kode,
                'nama_barang'=>$request->nama_barang,
                'kategori_id'=>$request->kategori,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'satuan'=>$request->satuan,
                'foto'=>$request->foto,
                //'created_at'=>now(),
            ]);

        return redirect()->route('barang.index')
                        ->with('success','Data barang Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = barang::find($id);
        return view('barang.detail',compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = kategori::all();
        //tampilkan data lama di form
        $row = barang::find($id);
        return view('barang.form_edit',compact('row','ar_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input barang dari form
        $request->validate([
            'kode' => 'required|unique:barang|max:5',
            'nama_barang' => 'required|max:45',
            //'harga' => 'required|double',
            'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'stok' => 'required|integer',
            'satuan' => 'required|max:45',
            'kategori' => 'required|integer',
            'foto' => 'nullable|max:45',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],
        //custom pesan errornya
        [
            'kode.required'=>'Kode Wajib Diisi',
            'kode.unique'=>'Kode Sudah Ada (Terduplikasi)',
            'kode.max'=>'Kode Maksimal 5 karakter',
            'nama_barang.required'=>'Nama Wajib Diisi',
            'nama_barang.max'=>'Nama Maksimal 45 karakter',
            'harga.required'=>'Harga Wajib Diisi',
            'harga.regex'=>'Harga Harus Berupa Angka',
            'stok.required'=>'Stok Wajib Diisi',
            'stok.integer'=>'Stok Harus Berupa Angka',
            'satuan.required'=>'Satuan Wajib Diisi',
            'satuan.max'=>'Satuan Maksimal 45 karakter',
            'kategori_id.required'=>'kategori barang Wajib Diisi',
            'kategori_id.integer'=>'kategori barang Wajib Diisi Berupa dari Pilihan yg Tersedia',
        ]
        );
        //barang::create($request->all());

        //lakukan update data dari request form edit
        DB::table('barang')->where('id',$id)->update(
            [
                'kode'=>$request->kode,
                'nama_barang'=>$request->nama_barang,
                'kategori_id'=>$request->kategori,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'satuan'=>$request->satuan,
                'foto'=>$request->foto,
                //'updated_at'=>now(),
            ]);

        return redirect('/barang'.'/'.$id)
                        ->with('success','Data barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        barang::where('id',$id)->delete();
        return redirect()->route('barang.index')
                        ->with('success','Data barang Berhasil Dihapus');
    }

    public function batal()
    {
        //$ar_barang = barang::all(); //eloquent
        $ar_barang = DB::table('barang')
                ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
                ->select('barang.*', 'kategori.nama as kategori')
                ->orderBy('barang.id', 'desc')
                ->get();

        return view('barang.index',compact('ar_barang'));
    }
}
