<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan; // Import the correct model
use App\Http\Resources\PelangganResource; //panggil resource
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan = Pelanggan::all();
        return new PelangganResource(true,'Data Pelanggan',$pelanggan);
    }
    public function show($id){
        $pelanggan = Pelanggan::find($id);
        return new PelangganResource(true,'Detail Pelanggan',$pelanggan);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:45',
            'alamat' => 'required',
            'no_hp' => 'required|max:15',
            'email' => 'required|email|max:45',
            'status_member' => 'required|boolean',
        ]);
        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'status_member'=> $request->status_member,
        ]);
        return new PelangganResource(true, 'Data Pelanggan Berhasil diinput',$pelanggan);
    }
}
