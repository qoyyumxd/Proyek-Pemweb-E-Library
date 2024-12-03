<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 buku terbaru untuk ditampilkan di dashboard siswa
        $books = Book::latest()->take(5)->get();
        return view('student.dashboard', compact('books'));
    }
}