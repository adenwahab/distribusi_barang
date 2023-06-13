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
        // Validate the form data
        $validatedData = $request->validate([
            // Add your validation rules here
            'name' => ['string', 'max:255'],
            'email' => [],
            // 'level' => ['required', Rule::in(['admin', 'manajer', 'kasir'])], //tambahkan validasi level
            'password' => [],
            'alamat' => ['string', 'max:255'],
            'no_hp' => ['numeric', 'min:11'],
        ]);


        // Update the user's account settings
        $user = Auth::user();
        $user = $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // 'level' => $validatedData['level'],
            'password' => Hash::make($validatedData['password']),
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],

        ]);

        if ($user) {
            // Display success message to the admin
            session()->flash('success', 'Account Update successfully.');
        } else {
            session()->flash('error', 'Failed to Update the account.');
        }
        return redirect('datauser');
    }
}
