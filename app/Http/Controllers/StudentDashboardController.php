<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(5)->get();
        return view('siswa.dashboard', compact('books'));
    }
}