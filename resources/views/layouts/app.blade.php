<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h4 class="text-center">Dashboard</h4>
            <nav>
                <ul>
                    @if(auth()->user()->role == 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard Admin</a></li>
                        <li><a href="{{ route('books.index') }}" class="nav-link">Kelola Buku</a></li>
                    @elseif(auth()->user()->role == 'siswa')
                        <li><a href="{{ route('siswa.dashboard') }}" class="nav-link">Dashboard Siswa</a></li>
                        <li><a href="{{ route('history') }}" class="nav-link">Riwayat</a></li>
                    @elseif(auth()->user()->role == 'kepala_perpustakaan')
                        <li><a href="{{ route('kepala.dashboard') }}" class="nav-link">Dashboard Kepala</a></li>
                        <li><a href="{{ route('kepala.reports') }}" class="nav-link">Laporan</a></li>
                    @endif
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>