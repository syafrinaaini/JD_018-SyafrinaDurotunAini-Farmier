<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Farmier</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        {{-- arahkan ke route POST /login --}}
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <h2>Login</h2>

            @if ($errors->any())
                <div class="error-box">
                {{ $errors->first() }}
                 </div>
            @endif


            {{-- Email --}}
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email</label>
            </div>

            {{-- Password --}}
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>

            {{-- Remember & Forgot --}}
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot password?</a>
            </div>

            {{-- Submit --}}
            <button type="submit">Log In</button>

            {{-- Register link --}}
            <a href="{{ url('/register') }}">
                <button type="button">Sign Up</button>
            </a>
        </form>
    </div>
</body>
</html>
