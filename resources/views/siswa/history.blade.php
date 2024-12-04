@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container mt-4">
    <h2>Riwayat Peminjaman</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->book->title }}</td>
                <td>{{ $transaction->borrow_date }}</td>
                <td>{{ $transaction->return_date }}</td>
                <td>{{ ucfirst($transaction->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection