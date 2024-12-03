<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $borrowToday = Transaction::whereDate('borrow_date', today())->count();
    $borrowThisMonth = Transaction::whereMonth('borrow_date', now()->month)->count();
    $borrowThisYear = Transaction::whereYear('borrow_date', now()->year)->count();
    $activeBorrowers = User::whereHas('transactions', function ($query) {
        $query->whereNull('return_date');
    })->count();

    $books = Book::withCount('transactions')->get();
    $bookTitles = $books->pluck('title')->toArray(); // Judul buku
    $borrowCounts = $books->pluck('transactions_count')->toArray();

    $user = auth()->user();
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

}
