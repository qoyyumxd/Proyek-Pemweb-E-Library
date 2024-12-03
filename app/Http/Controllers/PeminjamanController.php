<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
            ->join('users', 'peminjaman.user_id', '=', 'users.id')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->select(
                'peminjaman.*', 
                'users.name as nama_user', 
                'buku.judul as judul_buku'
            )
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }
}