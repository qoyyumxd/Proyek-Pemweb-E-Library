<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $totalStudents = User::where('role', 'siswa')->count();
        $borrowedBooks = Transaction::where('status', 'borrowed')->count();
        
        // Grafik peminjaman buku
        $bookTitles = Book::pluck('title')->toArray();
        $borrowCounts = Transaction::selectRaw('count(*) as borrow_count, month(created_at) as month')
                                    ->groupBy('month')
                                    ->orderBy('month')
                                    ->pluck('borrow_count', 'month');

        return view('kepala.dashboard', compact('totalBooks', 'totalStudents', 'borrowedBooks', 'bookTitles', 'borrowCounts'));
    }

    // Unduh laporan bulanan
    public function reports() 
{
    $pathToFile = storage_path('app/reports/monthly-report.pdf');
    
    if (!file_exists($pathToFile)) {
        abort(404, 'File laporan tidak ditemukan.');
    }

    return response()->download($pathToFile);
}
}