<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            /* Lebar kontainer login */
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00224D;
            /* Warna teks */
        }

        .login-container input[type="text"],
        .login-container input[type="name"],
        .login-container input[type="password"],
        .login-container input[type="email"],
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-text {
            text-decoration: none;
        }

        .register-link a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-text">
            <a href="{{ route('register') }}" style="text-decoration: none;">
                <h2>Register</h2>
            </a>
        </div>
        <form action="{{ route('reg-proses') }}" method="POST">
            @csrf
            <input type="name" value="{{ old('name') }}" name="name" placeholder="Name" required>
            <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <small>
            Sudah punya akun?
            <a href="{{ route('login') }}" class="register-link">Login disini</a>.
        </small>
    </div>

    @if ($message = Session::get('error'));
    <script>
        alert("{{ $message }}")
    </script>
        
    @endif
</body>

</html>
