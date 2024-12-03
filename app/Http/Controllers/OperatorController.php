<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IzinAkses;

class OperatorController extends Controller
{
    function admin()
    {
        return view('admin.dashboard');
    }
    function siswa()
    {
        return view('siswa.dashboard');
    }
    function kepala_perpustakaan()
    {
        return view('kepala.dashboard');
    }
}