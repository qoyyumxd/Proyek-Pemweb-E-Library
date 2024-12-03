@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Peminjaman Buku</h1>
<form id="borrowBookForm" method="POST" action="{{ route('borrow.store') }}">
    @csrf
    <div>
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" required />
    </div>
    <div>
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" required />
    </div>
    <div>
        <label for="book">Judul Buku</label>
        <select id="book" name="book_id" required>
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }} - {{ $book->author }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="borrow_date">Tanggal Meminjam</label>
        <input type="date" id="borrow_date" name="borrow_date" required />
    </div>
    <div>
        <label for="return_date">Perkiraan Tanggal Pengembalian</label>
        <input type="date" id="return_date" name="return_date" required />
    </div>
    <button type="submit">Ajukan Peminjaman</button>
</form>
</div>
@endsection