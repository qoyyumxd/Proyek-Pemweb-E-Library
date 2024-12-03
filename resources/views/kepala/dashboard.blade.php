
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala Perpustakaan Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kepala Perpustakaan</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h1>Statistik Penggunaan</h1>
        <p>Laporan bulanan dapat diunduh di sini.</p>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <div>
        <h3>Total Buku: {{ $totalBooks }}</h3>
        <h3>Total Siswa: {{ $totalStudents }}</h3>
        <h3>Buku Sedang Dipinjam: {{ $borrowedBooks }}</h3>
    </div>
    
</body>
</html>