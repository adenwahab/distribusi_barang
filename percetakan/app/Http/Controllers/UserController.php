<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = \App\Models\User::all();

        return view('user.index', ['title' => 'data user'], compact('data'));
    }
}
