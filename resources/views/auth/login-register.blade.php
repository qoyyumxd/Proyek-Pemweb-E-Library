<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f3e8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            width: 800px;
            height: 500px;
        }

        .logo-container {
            background-color: #f3eaf2;
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .logo-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        .logo-container h3 {
            color: #7a5c61;
        }

        .form-container {
            width: 60%;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }

        .toggle-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .toggle-buttons .btn {
            margin: 5px;
            width: 120px;
        }

        .form-control {
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn-submit {
            background-color: #a3c4bc;
            border: none;
            color: #ffffff;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #92b2a5;
        }

        .hidden {
            display: none;
        }

        .divider {
            width: 2px;
            background-color: #e0e0e0;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/logounnes.jpg') }}" alt="Logo UNNES">
            <h3>E-PERPUSTAKAAN</h3>
        </div>

        <div class="divider"></div>

        <div class="form-container">
            <div class="toggle-buttons">
                <button class="btn btn-outline-primary" id="btn-login">Login</button>
                <button class="btn btn-outline-secondary" id="btn-register">Register</button>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="form-login" action="{{ route('login') }}" method="POST">
                @csrf
                <h4 class="mb-3">Login</h4>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-submit w-100">Login</button>
            </form>

            <form id="form-register" action="{{ route('register') }}" method="POST" class="hidden">
                @csrf
                <h4 class="mb-3">Register</h4>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                <button type="submit" class="btn btn-submit w-100">Register</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('btn-login').addEventListener('click', function () {
            document.getElementById('form-login').classList.remove('hidden');
            document.getElementById('form-register').classList.add('hidden');
        });

        document.getElementById('btn-register').addEventListener('click', function () {
            document.getElementById('form-register').classList.remove('hidden');
            document.getElementById('form-login').classList.add('hidden');
        });
    </script>
</body>
</html>