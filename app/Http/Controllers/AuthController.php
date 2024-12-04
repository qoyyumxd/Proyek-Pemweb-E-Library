<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Http\Middleware\IzinAkses;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,siswa,kepala_perpustakaan',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ], [
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi'
    ]
    );

    $infologin = [
        'email'=>$request->email,
        'password'=>$request->password,
    ];

    $user = User::where('email', $infologin['email'])->first();

    if ($user && Hash::check($infologin['password'], $user->password)) {
        
        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role == 'siswa') {
                return redirect()->route('siswa.dashboard');
            } elseif (Auth::user()->role == 'kepala_perpustakaan') {
                return redirect()->route('kepala.dashboard');
            }
        } 
            
            return redirect()->route('login')->withErrors('Email dan Password yang dimasukkan tidak sesuai.')->withInput();
        }
    }

    public function logout()
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }