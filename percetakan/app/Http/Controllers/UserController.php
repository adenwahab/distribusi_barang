<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::all();

        return view('user.index', ['title' => 'data user'], compact('data'));
    }

    public function destroy(string $id)
    {
        if (Auth::user()->level == 'admin') {
            $deletedAccount = User::where('id', $id)->delete();
            // if ($deletedAccount) {
            //     // Display success message to the admin
            //     session()->flash();
            // } else {
            //     Session()->flash('error', 'Failed to delete the account.');
            // }
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->back();
        } else {
            session()->flash('error', 'You are not authorized to delete this account.');
            return back();
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'level' => 'required',
        ]);

        $user->update($request->all());

        Alert::success('Success', 'Data berhasil diubah');
        return redirect()->route('user.index')->withSuccess('Task Created Successfully!');
    }
}
