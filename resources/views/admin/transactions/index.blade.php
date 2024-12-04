@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Transaksi</h1>
<table>
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>NIM</th>
            <th>Judul Buku</th>
            <th>Tanggal Meminjam</th>
            <th>Perkiraan Pengembalian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->student->name }}</td>
                <td>{{ $transaction->student->nim }}</td>
                <td>{{ $transaction->book->title }}</td>
                <td>{{ $transaction->borrow_date }}</td>
                <td>{{ $transaction->return_date }}</td>
                <td>{{ $transaction->return_date ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{ route('admin.transactions.return', $transaction->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <button type="submit" {{ $transaction->return_date ? 'disabled' : '' }}>Kembalikan</button>
</form>
</div>
@endsection