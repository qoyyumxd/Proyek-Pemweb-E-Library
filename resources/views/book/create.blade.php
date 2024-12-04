<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Tambah Buku</h1>
        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Pengarang:</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Stok:</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
        <form id="book-form">
            @csrf
            <label>Judul:</label>
            <input type="text" name="title" id="title" required>
            <label>Penulis:</label>
            <input type="text" name="author" id="author" required>
            <label>Stok:</label>
            <input type="number" name="stock" id="stock" required>
            <button type="submit">Simpan</button>
        </form>
    </div>
    <script>
        $('#book-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('books.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert('Buku berhasil disimpan!');
                    location.reload(); // Refresh halaman
                },
                error: function(response) {
                    alert('Gagal menyimpan buku.');
                }
            });
        });
    </script>
</body>
</html>