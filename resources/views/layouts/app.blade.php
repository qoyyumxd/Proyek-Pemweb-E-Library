<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 bg-dark text-white vh-100">
        <ul class="nav flex-column">
          @if(auth()->user()->role == 'admin')
          <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link text-white">Kelola Data Buku</a></li>
          <li class="nav-item"><a href="{{ route('students.index') }}" class="nav-link text-white">Kelola Data Siswa</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-white">Transaksi</a></li>
          <li class="nav-item"><a href="#" class="nav-link text-white">Laporan</a></li>
          @elseif(auth()->user()->role == 'siswa')
          <li class="nav-item"><a href="{{ route('siswa.dashboard') }}" class="nav-link text-white">Dashboard Siswa</a></li>
          <li class="nav-item"><a href="{{ route('history') }}" class="nav-link text-white">Riwayat Peminjaman</a></li>
          @endif
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 py-3">
        @yield('content')
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>