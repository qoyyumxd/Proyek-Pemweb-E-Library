@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="container mt-4 text-center">
  <h2 class="mb-2">Selamat Datang, {{ auth()->user()->name }}</h2>
    <p class="mb-4">Daftar Buku Tersedia</p>
  <div class="row d-flex justify-content-center">
    @foreach($books as $book)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card shadow" style="height: 100%;">
          <img src="{{ asset('images/books/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="max-height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate">{{ $book->title }}</h5>
            <p class="card-text text-muted"><strong>Pengarang:</strong> {{ $book->author }}</p>
            <div class="mt-auto">
            <form action="{{ route('borrow.book', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin meminjam buku ini?')">
              @csrf
              <button class="btn btn-primary w-100">Ajukan Pinjaman</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    @endforeach
</div>
</div>
@endsection