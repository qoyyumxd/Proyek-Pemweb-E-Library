<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public function borrowBook(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->book_id = $book->id;
        $transaction->save();

        return redirect()->route('siswa.dashboard')->with('success', 'Buku berhasil dipinjam!');
    }

    public function viewHistory()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();

        return view('siswa.history', compact('transactions'));
    }

    public function create($id)
{
    $book = Book::findOrFail($id); // Ambil data buku berdasarkan ID
    return view('siswa.borrow-form', compact('book'));
}

public function store(Request $request, $id)
{
    $request->validate([
        'borrow_date' => 'required|date',
        'return_date' => 'required|date|after:borrow_date',
    ]);

    $book = Book::findOrFail($id);

    Transaction::create([
        'user_id' => auth::id(), // ID siswa
        'book_id' => $book->id,
        'borrow_date' => $request->borrow_date,
        'return_date' => $request->return_date,
        'status' => 'dipinjam',
    ]);

    // Update jumlah peminjaman pada dashboard admin/kepala perpustakaan
    $book->increment('borrowed_count'); // Menambah jumlah buku yang dipinjam

    return redirect()->route('history')->with('success', 'Peminjaman berhasil diajukan.');
}
public function history()
{
    $transactions = Transaction::where('user_id', auth::id())->with('book')->get();
    return view('siswa.history', compact('transactions'));
}

}