<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $ar_member = DB::table('pelanggan')
            ->where('status_member', '1')
            // ->orderBy('member.id', 'desc')
            ->get();
        return view('member.index', compact('ar_member'), ['title' => 'Member']);
    }
}
