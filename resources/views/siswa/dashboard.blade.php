@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<h2>Selamat Datang, {{ auth()->user()->name }}</h2>

<h4>Daftar Buku Tersedia</h4>
<div class="row">
  @foreach($books as $book)
    <div class="col-md-4">
      <div class="card">
        <img src="{{ asset('images/books/' . $book->image) }}" class="card-img-top" alt="book image">
        <div class="card-body">
          <h5 class="card-title">{{ $book->title }}</h5>
          <p class="card-text">{{ $book->author }}</p>
          <a href="{{ route('borrow.book', $book->id) }}" class="btn btn-primary">Pinjam Buku</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection