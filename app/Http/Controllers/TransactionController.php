<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with('student', 'book')->get();
    return view('admin.transactions.index', compact('transactions'));
}

public function returnBook($id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->return_date = now();
    $transaction->save();

    // Tambahkan stok kembali ke buku
    $transaction->book->increment('stock');

    return redirect()->route('admin.transactions.index')->with('success', 'Buku berhasil dikembalikan.');
}

public function report()
{
    $report = Transaction::select(
        'students.name as student_name',
        'books.title as book_title',
        'books.author as book_author',
        'transactions.borrow_date',
        'transactions.return_date'
    )
    ->join('students', 'transactions.student_id', '=', 'students.id')
    ->join('books', 'transactions.book_id', '=', 'books.id')
    ->get();
    
    $borrowedBooks = Transaction::whereNull('return_date')->count();
    
    return view('admin.reports.index', compact('report'));
    }
    public function borrowBook(Book $book)
    {
        // Simpan transaksi peminjaman buku
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->book_id = $book->id;
        $transaction->save();

        return redirect()->route('dashboard')->with('success', 'Buku berhasil dipinjam!');
    }

    public function viewHistory()
    {
        // Menampilkan riwayat peminjaman buku
        $transactions = Transaction::where('user_id', auth()->id())->get();
        return view('student.history', compact('transactions'));
    }
}