@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<h4>Daftar Buku Perpustakaan</h4>
<form method="GET" action="{{ route('books.search') }}">
    <input type="text" name="title" placeholder="Cari judul buku" class="form-control" value="{{ request('title') }}">
    <input type="text" name="author" placeholder="Cari pengarang" class="form-control" value="{{ request('author') }}">
    <input type="text" name="category" placeholder="Cari kategori" class="form-control" value="{{ request('category') }}">
    <button type="submit" class="btn btn-primary mt-2">Cari</button>
</form>

<div class="row mt-3">
  @foreach($books as $book)
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $book->title }}</h5>
          <p class="card-text">{{ $book->author }}</p>
          <p class="card-text">{{ $book->category }}</p>
          <a href="{{ route('borrow.book', $book->id) }}" class="btn btn-primary">Pinjam Buku</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection