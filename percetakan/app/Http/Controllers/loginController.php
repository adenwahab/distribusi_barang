<?php

//make a user controller class
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login()
    {
        return view('login.loginpage', [
            'title' => 'Login',
            // 'active' => 'login'
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
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where($request->username)->first();
        $password = Hash::check($request->password, $user->password);

        if (!$password) {
            Session::flash('danger', 'Could not log you in, please recheck your password.');
            return redirect('/account/login');
        }

        if (!$user->confirmed) {
            Session::flash('warning', 'You have not yet confirmed your username.');
            return redirect('/account/login');
        }

        Auth::login($user);
        Session::flash('success', 'You have logged in successfully.');
        return redirect('/account/dashboard');

        // dd('Berhasil Login');
        // $credentials = $request->only('username', 'password');
        // dd($credentials);
        // $request->session()->flush('success', 'Login Berhasil');

    }
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('pesan', "Logout berhasil");
    }
}
