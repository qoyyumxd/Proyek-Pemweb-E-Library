@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $book->stock }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection