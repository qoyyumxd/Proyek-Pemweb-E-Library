<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
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
            <form id="form-login" action="{{ route('login') }}" method="POST">
                @csrf
                <label>Email:</label>
                <input type="email" name="email" placeholder="Email" required>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#" class="forgot-password">Forgot Password</a>
                <button type="submit" class="btn-login">Login</button>
            </form>
            <p class="mt-3">Belum punya akun? 
                <a href="{{ route('register') }}" class="btn-register-link">Register Sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>