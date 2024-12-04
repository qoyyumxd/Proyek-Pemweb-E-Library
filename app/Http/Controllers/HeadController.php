<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    // Dashboard Kepala Perpustakaan
    public function index()
    {
        $totalBooks = Book::count();
        $totalStudents = Student::count();
        $borrowedBooks = Transaction::whereNull('return_date')->count();
        
        // Grafik peminjaman buku
        $bookTitles = Book::pluck('title');
        $borrowCounts = Book::withCount(['transactions' => function ($query) {
            $query->whereNull('return_date');
        }])->pluck('transactions_count');

        return view('kepala.dashboard', compact('totalBooks', 'totalStudents', 'borrowedBooks', 'bookTitles', 'borrowCounts'));
    }

    // Unduh laporan bulanan
    public function reports()
    {
        // Mengarahkan file laporan bulanan (contoh file statis)
        $pathToFile = storage_path('app/reports/monthly-report.pdf');
        return response()->download($pathToFile);
    }
}