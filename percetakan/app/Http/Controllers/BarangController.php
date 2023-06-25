<?php

namespace App\Http\Controllers;

use App\Models\Barang; //panggil model
use App\Models\kategori; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use File;


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

        return view('barang.index', compact('ar_barang'), ['title' => 'Data Barang']);
    }

    public function dataBahan()
    {
        $ar_bahan = barang::all(); //eloquent
        return view('landingpage.hero', compact('ar_bahan'), ['title' => 'Data Barang']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = Kategori::all();
        //arahkan ke form input data
        return view('barang.form', compact('ar_kategori'), ['title' => 'Input Barang Baru']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input barang dari form
        $request->validate(
            [
                'kode' => 'required|unique:barang|max:5',
                'nama_barang' => 'required|max:45',
                //'harga' => 'required|double',
                'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'harga_member' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'stok' => 'required|integer',
                'satuan' => 'required|max:45',
                'kategori' => 'required|integer',
                //'foto' => 'nullable|max:45',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            //custom pesan errornya
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama_barang.required' => 'Nama Wajib Diisi',
                'nama_barang.max' => 'Nama Maksimal 45 karakter',
                'harga.required' => 'Harga Wajib Diisi',
                'harga.regex' => 'Harga Harus Berupa Angka',
                'harga_member.regex' => 'harga_member Harus Berupa Angka',
                'stok.required' => 'Stok Wajib Diisi',
                'stok.integer' => 'Stok Harus Berupa Angka',
                'satuan.required' => 'satuan Wajib Diisi',
                'satuan.max' => 'satuan Maksimal 45 karakter',
                'kategori_id.required' => 'kategori barang Wajib Diisi',
                'kategori_id.integer' => 'kategori barang Wajib Diisi Berupa dari Pilihan yg Tersedia',
                'foto.min' => 'Ukuran file kurang 2 MB',
                'foto.max' => 'Ukuran file melebihi 2 MB ',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ]

        );
        //barang::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'barang_' . $request->kode . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/img'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan insert data dari request form
        try {
            DB::table('barang')->insert(
                [
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kategori_id' => $request->kategori,
                    'harga' => $request->harga,
                    'harga_member' => $request->harga_member,
                    'stok' => $request->stok,
                    'satuan' => $request->satuan,
                    //'foto'=>$request->foto,
                    'foto' => $fileName,

                    //'created_at'=>now(),
                ]
            );

            return redirect()->route('barang.index')
                ->with('success', 'Data barang Baru Berhasil Disimpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('barang.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = barang::find($id);

        return view('barang.detail', compact('rs'), ['title' => 'Detail Barang']);
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

        return view('barang.form_edit', compact('row', 'ar_kategori'), ['title' => 'Edit Barang']);
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
                'nama_barang' => 'required|max:45',
                //'harga' => 'required|double',
                'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'harga_member' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'stok' => 'required|integer',
                'satuan' => 'required|max:45',
                'kategori' => 'required|integer',
                //'foto' => 'nullable|max:45',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            //custom pesan errornya
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama_barang.required' => 'Nama Wajib Diisi',
                'nama_barang.max' => 'Nama Maksimal 45 karakter',
                'harga.required' => 'Harga Wajib Diisi',
                'harga.regex' => 'Harga Harus Berupa Angka',
                'harga_member.regex' => 'Harga Harus Berupa Angka',
                'stok.required' => 'Stok Wajib Diisi',
                'stok.integer' => 'Stok Harus Berupa Angka',
                'satuan.required' => 'Satuan Wajib Diisi',
                'satuan.max' => 'Satuan Maksimal 45 karakter',
                'kategori.required' => 'kategori barang Wajib Diisi',
                'kategori.integer' => 'kategori barang Wajib Diisi Berupa dari Pilihan yg Tersedia',
                'foto.min' => 'Ukuran file kurang 2 MB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );
        //barang::create($request->all());
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('barang')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru--------- --
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('admin/assets/img/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'barang_' . $request->kode . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/img'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        //lakukan update data dari request form edit
        DB::table('barang')->where('id', $id)->update(
            [
                'kode' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'kategori_id' => $request->kategori,
                'harga' => $request->harga,
                'harga_member' => $request->harga_member,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                //'foto'=>$request->foto,
                'foto' => $fileName,

                //'updated_at'=>now(),
            ]
        );

        return redirect('/barang' . '/' . $id)
            ->with('success', 'Data barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(string $id)
    {

        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Barang::find($id);
        if ($row->foto && Storage::exists('admin/assets/img/' . $row->foto)) {
            Storage::delete('admin/assets/img/' . $row->foto);
            if (!empty($row->foto)) unlink('admin/assets/img/' . $row->foto);
        }
        //hapus data di database
        Barang::where('id', $id)->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Dihapus');
    }*/

    public function destroy($id)
    {
        // Find the record to be deleted
        try {
            // Check if the associated foto exists and delete it
            $row = Barang::where('id', $id)->first();

            // hapus data
            Barang::where('id', $id)->delete();
            File::delete('admin/assets/img/' . $row->foto);
            // if (!empty($row->foto)) {
            //     unlink('admin/assets/img/' . $row->foto);
            //     Barang::where('id', $id)->delete();
            //     //hapus data di database
            // }
            // if (empty($row->foto)) {
            //     Barang::where('id', $id)->delete();
            // }
            return redirect()->route('barang.index')
                ->with('success', 'Data Barang Berhasil Dihapus');
        } catch (QueryException $e) {
            $errorCode = $e->getCode();

            if ($errorCode == 23000) {
                return redirect()->route('barang.index')
                    ->with('error', 'Data Barang Gagal Dihapus, Karena Masih Digunakan Pada Tabel Lain');
            } else {
                return redirect()->route('barang.index')
                    ->with('error', 'Data barang Gagal Dihapus');
            }
        }
    }

    public function batal()
    {
        //$ar_barang = barang::all(); //eloquent
        $ar_barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.nama as kategori')
            ->orderBy('barang.id', 'desc')
            ->get();

        return view('barang.index', compact('ar_barang'), ['title' => 'Data Barang']);
    }
    //--------------------Rest API-----------------------
    public function apiBarang()
    {
        $ar_barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.nama as kategori')
            ->orderBy('barang.id', 'desc')
            ->get();


        return response()->json(
            [
                'success' => true,
                'message' => 'Data Barang',
                'data' => $ar_barang,
            ]
        );
    }
    public function apiBarangDetail($id)
    {
        $rs = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
            ->select('barang.*', 'kategori.nama as kategori')
            ->where('barang.id', '=', $id)
            ->get();
        if($rs){
            return response ()->json(
                [
                    'success' => true,
                    'message' => 'Detail Barang',
                    'data' => $rs,
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Barang Tidak Ditemukan',
                ]
            );
        }
    }
}
