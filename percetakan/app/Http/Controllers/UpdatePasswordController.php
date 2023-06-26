<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    //
    public function index()
    {
        $ar_user = Auth::user();
        return view('user.updatepassword', ['title' => 'Update Password']);
    }

    public function update()
    {
        $user = Auth::user();
        $validateData = request()->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($validateData['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($validateData['password']);
        $user->save();

        return redirect('datauser')->with('success', 'Password updated successfully.');
    }
}
