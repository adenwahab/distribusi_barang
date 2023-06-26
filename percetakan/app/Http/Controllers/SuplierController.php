<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuplaiBarang; //panggil model
use App\Models\Suplier; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Database\QueryException;

use function PHPUnit\Framework\callback;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_suplier = DB::table('suplier')
            ->orderBy('suplier.id', 'desc')
            ->get();


        return view('suplier.index', compact('ar_suplier'), ['title' => 'suplier']);
    }

    public function dataPilihan()
    {
        $ar_pilihan = suplier::all(); //eloquent

        return view('landingpage.about', compact('ar_pilihan'), ['title' => 'suplier']);
    }

    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_suplier = suplier::all();
        //arahkan ke form input data

        return view('suplier.form', compact('ar_suplier'), ['title' => 'suplier']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input suplier dari form
        $request->validate(
            [
                'nama' => 'required|max:45',
                'alamat' => 'required|max:45',
                'no_hp' => 'required|max:15',
                'email' => 'nullable|max:45',

            ],
            //custom pesan errornya
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
            ]
        );
        //Suplier::create($request->all());

        //lakukan insert data dari request form
        DB::table('suplier')->insert(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
            ]
        );

        return redirect()->route('suplier.index')
            ->with('success', 'Data Suplier Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = SuplaiBarang::where('suplier_id', $id)->get();
        return view('suplier.detail', compact('rs'), ['title' => 'Data Suplai_barang']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        //$ar_suplai_barang = Suplai_barang::all();
        //tampilkan data lama di form
        $row = Suplier::find($id);

        return view('suplier.form_edit', compact('row'), ['title' => 'Edit Data Suplier']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input suplier dari form
        $request->validate(
            [

                'nama' => 'required|max:45',
                'alamat' => 'required|max:45',
                'no_hp' => 'required|max:15',
                'email' => 'nullable|max:45',

            ],
            //custom pesan errornya
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
            ]
        );
        //Suplier::create($request->all());

        //lakukan insert data dari request form
        DB::table('suplier')->where('id', $id)->update(
            [

                'nama' => $request->nama,
            ]
        );

        return redirect('/suplier' . '/' . $id)
            ->with('success', 'Data Suplier Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Suplier::where('id', $id)->delete();
            return redirect()->route('suplier.index')
                ->with('success', 'Data Suplier Berhasil Dihapus');
        } catch (QueryException $e) {
            $errorCode = $e->getCode();
            if ($errorCode == 23000) {
                return redirect()->route('suplier.index')
                    ->with('error', 'Data Suplier Gagal Dihapus, Karena Data Masih Digunakan');
            } else {
                return redirect()->route('suplier.index')
                    ->with('error', 'Data Suplier Gagal Dihapus');
            }
        }
    }

    public function batal()
    {
        $ar_suplier = DB::table('suplier')
            ->orderBy('suplier.id', 'desc')
            ->get();

        return view('suplier.index', compact('ar_suplier'), ['title' => 'Data Suplier']);
    }
}
