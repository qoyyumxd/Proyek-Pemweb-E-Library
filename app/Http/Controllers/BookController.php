<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex()
    {
        $books = Book::all();
        $books = Book::withCount('transactions')->get();
        $bookTitles = $books->pluck('title')->toArray(); // Judul buku
        $borrowCounts = $books->pluck('transactions_count')->toArray(); // Jumlah peminjaman per buku
    return view('admin.books.index', compact('books'), [
        'bookTitles' => $bookTitles,
        'borrowCounts' => $borrowCounts
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function siswaIndex() {
        $books = Book::all();
        return view('siswa.books.index', compact('books'));
    }
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
    return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }

    public function search(Request $request)
    {
        // Pencarian buku berdasarkan judul, pengarang, atau kategori
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