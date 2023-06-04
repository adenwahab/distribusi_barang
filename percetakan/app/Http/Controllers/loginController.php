<?php

//make a user controller class
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login()
    {
        return view('login.loginpage', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        //validasi data
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8|max:20',
            'cpassword' => 'required|same:password'
        ]);

        //jika validasi tidak ada maka simpan data
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        //setelah selesai simpan data, maka redirect ke halaman login
        return redirect('login')->with('pesan', "User berhasil ditambahkan");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd('Berhasil Login');
        $credentials = $request->only('username', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        return redirect('login')->with('pesan', "Login gagal, periksa kembali username dan password anda");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('pesan', "Logout berhasil");
    }
}
