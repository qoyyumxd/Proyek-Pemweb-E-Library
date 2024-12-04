<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <img src="{{ asset('images/logounnes.png') }}" alt="Logo UNNES">
                <h2>E-Perpustakaan</h2>
            </div>
            <form id="form-register" action="{{ route('register') }}" method="POST">
                @csrf
                <h4 class="mb-3">Register</h4>
                <label>Nama:</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                
                <label>Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                
                <label>Pilih Role:</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                    <option value="kepala_perpustakaan">Kepala Perpustakaan</option>
                </select>
                
                <button type="submit" class="btn btn-submit w-100 mt-3">Register</button>
            </form>
        </div>
    </div>
</body>
</html>