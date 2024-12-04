<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="admin-dashboard.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
  <div class="container-fluid">
    <!-- Sidebar -->
    <div class="row">
      <nav class="col-md-2 bg-dark text-white vh-100">
        <h4 class="py-3 text-center">Admin Dashboard</h4>
        <ul class="nav flex-column">
          <li class="nav-item"><a href="{{ route('admin.dashboard') }}" 
            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} text-white">Dashboard</a></li>        
          <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link text-white">Kelola Data Buku</a></li>
          <li class="nav-item"><a href="{{ route('students.index') }}" class="nav-link text-white">Kelola Data Siswa</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-white">Transaksi</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-white">Laporan</a></li>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10">
        <header class="d-flex justify-content-between align-items-center py-3">
          <h2>Dashboard</h2>
          <div>
            <span class="me-3">Hi, Admin!</span>
            <button class="btn btn-danger">Logout</button>
          </div>
        </header>

        <!-- Statistik -->
        <div class="row">
          <div class="col-md-4">
            <div class="card bg-primary text-white">
              <div class="card-body">
                  <h5>Jumlah Buku Dipinjam</h5>
                  <p>Hari Ini: {{ $borrowToday }}</p>
                  <p>Bulan Ini: {{ $borrowThisMonth }}</p>
                  <p>Tahun Ini: {{ $borrowThisYear }}</p>
              </div>
          </div>
          
          <div class="card bg-success text-white">
              <div class="card-body">
                  <h5>Jumlah Peminjam Aktif</h5>
                  <p>{{ $activeBorrowers }} Peminjam</p>
              </div>
          </div>
          
          <div class="card bg-warning text-dark">
              <div class="card-body">
                  <h5>Total Stok Buku</h5>
                  <p>{{ $bookStock }} Buku</p>
              </div>
          </div>          
          </div>
        </div>

        <!-- Grafik Aktivitas -->
        <div class="mt-4">
          <h4>Grafik Aktivitas Perpustakaan</h4>
          <canvas id="activityChart"></canvas>
        </div>
      <h4>Riwayat Transaksi</h4>
        <ul>
          @foreach($transactions as $transaction)
            <li>Buku: {{ $transaction->book->title ?? 'Data tidak tersedia' }}, 
                Status: {{ $transaction->status }}</li>
          @endforeach
        </ul>
      </main>
    </div>
  </div>
  <canvas id="booksChart"></canvas>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('booksChart').getContext('2d');
var booksChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($bookTitles), // Variabel $bookTitles dari controller
        datasets: [{
            label: 'Jumlah Buku Dipinjam',
            data: @json($borrowCounts), // Variabel $borrowCounts dari controller
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
    
    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
    <script>
        fetch('{{ route('api.dashboard.stats') }}')
    .then(response => response.json())
    .then(data => {
        booksChart.data.datasets[0].data = [data.today, data.this_month, data.this_year];
        booksChart.update();
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>
</html>