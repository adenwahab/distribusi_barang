<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UpdateLevelController extends Controller


{

    public function edit(string $id)
    {
        Auth::user()->level == 'admin';
        //tampilkan data lama di form
        $row = user::find($id);

        return view('user.updatelevel', compact('row'), ['title' => 'Update Level']);
    }

    public function update(Request $request, string $id)
    {
        // Validate the form data
        $request->validate([
            'level' => ['required', Rule::in(['admin', 'manajer', 'kasir'])], //tambahkan validasi level
        ]);
        // Auth::user()->level == 'admin';

        // Update the member's level
        DB::table('users')->where('id', $id)->update(
            [
                'level' => $request->level,
                // 'updated_at'=>now(),
            ]
        );
        // Redirect back or to a specific page

        return redirect()->route('user.index')
            ->with('success', 'Berhasil Ganti Level');
    }
}
