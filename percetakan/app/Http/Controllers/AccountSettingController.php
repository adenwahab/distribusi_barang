<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    public function index()
    {
        $ar_user = Auth::user();
        return view('user.setting', compact('ar_user'), ['title' => 'Setting']);
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        // Validate the form data
        $validatedData = $request->validate([
            // Add your validation rules here
            'name' => ['string', 'max:255'],
            'email' => [],
            // 'level' => ['required', Rule::in(['admin', 'manajer', 'kasir'])], //tambahkan validasi level
            // 'password' => ['required', 'string', 'min:8'],
            'alamat' => ['string', 'max:255'],
            'no_hp' => ['numeric', 'min:11'],
            'current_password' => ['required', 'string', 'min:8'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // $user->level = $validatedData['level'];
        // $user->password = Hash::make($validatedData['password']);
        $user->alamat = $validatedData['alamat'];
        $user->no_hp = $validatedData['no_hp'];
        $user->save();

        if ($user) {
            // Display success message to the admin
            session()->flash('success', 'Account Update successfully.');
        } else {
            session()->flash('error', 'Failed to Update the account.');
        }
        return redirect('datauser');
    }
}
