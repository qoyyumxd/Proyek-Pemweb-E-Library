<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() 
    {
        if (Auth::user()->role === 'siswa') {

        $books = Book::all();
        return view('siswa.dashboard', compact('books'));

    } elseif (Auth::user()->role === 'admin') {
    $borrowToday = Transaction::whereDate('borrow_date', today())->count();
    $borrowThisMonth = Transaction::whereMonth('borrow_date', now()->month)->count();
    $borrowThisYear = Transaction::whereYear('borrow_date', now()->year)->count();
    $activeBorrowers = User::whereHas('transactions', function ($query) {
        $query->whereNull('return_date');
    })->count();

    $books = Book::withCount('transactions')->get();
    $bookTitles = $books->pluck('title')->toArray(); // Judul buku
    $borrowCounts = $books->pluck('transactions_count')->toArray();

    $user = Auth::user();
    $transactions = $user->transactions;

    return view('admin.dashboard', [
        'borrowToday' => $borrowToday,
        'borrowThisMonth' => $borrowThisMonth,
        'borrowThisYear' => $borrowThisYear,
        'activeBorrowers' => $activeBorrowers,
        'bookStock' => Book::sum('stock'),
        'transactions' => $transactions,
        'bookTitles' => $bookTitles,
        'borrowCounts' => $borrowCounts
    ]);
}
        abort(403, 'Unauthorized action.');
}

    public function getStats()
{
    $today = Transaction::whereDate('borrow_date', today())->count();
    $thisMonth = Transaction::whereMonth('borrow_date', now()->month)->count();
    $thisYear = Transaction::whereYear('borrow_date', now()->year)->count();

    return response()->json([
        'today' => $today,
        'this_month' => $thisMonth,
        'this_year' => $thisYear,
    ]);
    }
    public function dashboard()
{
    $totalBooksBorrowed = Transaction::count(); // Total transaksi peminjaman
    $mostBorrowedBooks = Book::orderBy('borrowed_count', 'desc')->take(5)->get(); // Buku paling sering dipinjam

    return view('admin.dashboard', compact('totalBooksBorrowed', 'mostBorrowedBooks'));
}

}