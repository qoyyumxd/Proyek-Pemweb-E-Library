<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
{
    $books = Book::where('stock', '>', 0)->get(); // Ambil buku yang tersedia
    return view('borrow', compact('books'));
}

public function store(Request $request)
{
    // Proses form peminjaman (detailnya sudah dijelaskan sebelumnya)
}
}
