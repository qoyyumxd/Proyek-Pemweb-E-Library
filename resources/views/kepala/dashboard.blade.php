@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Kepala Perpustakaan</h1>
    <div class="row">
        <!-- Kartu Total Buku -->
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <h5>Total Buku</h5>
                    <p>{{ $totalBooks }} Buku</p>
                </div>
            </div>
        </div>
        
        <!-- Kartu Total Siswa -->
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <h5>Total Siswa</h5>
                    <p>{{ $totalStudents }} Siswa</p>
                </div>
            </div>
        </div>
        
        <!-- Kartu Buku Dipinjam -->
        <div class="col-md-4 mb-3">
            <div class="card bg-warning text-dark h-100">
                <div class="card-body">
                    <h5>Buku Sedang Dipinjam</h5>
                    <p>{{ $borrowedBooks }} Buku</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Aktivitas -->
    <div class="mt-4">
        <h4>Grafik Aktivitas Perpustakaan</h4>
        <canvas id="activityChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('activityChart').getContext('2d');
    var activityChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($bookTitles),
            datasets: [{
                label: 'Jumlah Buku Dipinjam',
                data: @json($borrowCounts),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection