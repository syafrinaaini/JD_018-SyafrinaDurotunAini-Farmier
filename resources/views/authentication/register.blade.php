<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Farmier</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <h2>Register</h2>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="error-box">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Nomor HP --}}
            <div class="input-field">
                <input type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel">
                <label>Nomor HP</label>
            </div>

            {{-- Email --}}
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label>Email</label>
            </div>

            {{-- Password --}}
            <div class="input-field">
                <input type="password" name="password" required autocomplete="new-password">
                <label>Password</label>
            </div>

            {{-- Password Confirmation --}}
            <div class="input-field">
                <input type="password" name="password_confirmation" required autocomplete="new-password">
                <label>Konfirmasi Password</label>
            </div>

            <div class="input-field">
    <label for="role">Daftar Sebagai</label>
    <div class="custom-select" id="role-select">
        <input type="text" placeholder="Cari role..." id="role-search">
        <ul id="role-options">
            <li data-value="peternak">
                <span class="icon purple"></span> Peternak 🐄
            </li>
            <li data-value="vendor">
                <span class="icon yellow"></span> Vendor 🛒
            </li>
            <li data-value="admin">
                <span class="icon red"></span> Admin ⚙️
            </li>
        </ul>
    </div>
    <input type="hidden" name="role" id="role-input" required>
</div>

            {{-- Submit --}}
            <button type="submit">Sign Up</button>

            {{-- Login link --}}
            <p class="login-link">
                Sudah punya akun?
                <a href="{{ url('/login') }}">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
