@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')

@section('content')
<h4>Riwayat Peminjaman Anda</h4>
<table class="table">
  <thead>
    <tr>
      <th>Buku</th>
      <th>Tanggal Peminjaman</th>
      <th>Tanggal Pengembalian</th>
    </tr>
  </thead>
  <tbody>
    @foreach($transactions as $transaction)
      <tr>
        <td>{{ $transaction->book->title }}</td>
        <td>{{ $transaction->borrowed_at }}</td>
        <td>{{ $transaction->returned_at ?? 'Belum dikembalikan' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection