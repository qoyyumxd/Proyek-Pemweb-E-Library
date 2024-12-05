<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
{
    if (Auth::user()->role === 'admin') {
        // Data untuk admin
        $books = Book::withCount('transactions')->get();
        $bookTitles = $books->pluck('title')->toArray();
        $borrowCounts = $books->pluck('transactions_count')->toArray();

        return view('admin.books.index', compact('books'), [
            'bookTitles' => $bookTitles,
            'borrowCounts' => $borrowCounts,
        ]);
    } elseif (Auth::user()->role === 'siswa') {
        // Data untuk siswa
        $books = Book::all();
        return view('siswa.books.index', compact('books'));
    }

    abort(403, 'Unauthorized action.');
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);
    
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
    return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);
    
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = Book::query();
        
        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }
        
        if ($request->has('author')) {
            $query->where('author', 'LIKE', '%' . $request->author . '%');
        }

        if ($request->has('category')) {
            $query->where('category', 'LIKE', '%' . $request->category . '%');
        }

        $books = $query->get();

        return view('student.books.index', compact('books'));
    }
}