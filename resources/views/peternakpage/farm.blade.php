<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Peternakan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
</head>
<body>
<div class="layout">
    {{-- Sidebar --}}
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo-farmier.png') }}" alt="Logo Farmier">
        </div>
        <nav>
            <ul class="menu">
                <li><a href="{{ route('peternak.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('livestocks.index') }}">Manajemen Ternak</a></li>
                <li><a href="#">Tawaran</a></li>
                <li><a href="#">Pesan</a></li>
                <li><a href="#">Pengaturan</a></li>
            </ul>
        </nav>
    </aside>

    {{-- Konten utama --}}
    <main class="content">
        <h1>Form Pendaftaran Peternakan</h1>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <p><strong>Periksa lagi data kamu:</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peternak.simpan') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf

            {{-- name --}}
            <div class="form-group">
                <label for="name">Nama Peternakan <span class="req">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            {{-- location --}}
            <div class="form-group">
                <label for="location">Alamat / Lokasi <span class="req">*</span></label>
                <textarea id="location" name="location" rows="3" required>{{ old('location') }}</textarea>
            </div>

            {{-- description --}}
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="3" placeholder="Deskripsikan peternakanmu disini.">{{ old('description') }}</textarea>
            </div>

            {{-- website --}}
            <div class="form-group">
                <label for="website">Sosial Media (Opsional)</label>
                <input type="url" id="website" name="website" value="{{ old('website') }}" placeholder="instagram: genjaharum_">
            </div>

            {{-- photo --}}
            <div class="form-group">
                <label for="photo">Foto Peternakan</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>

            <div class="actions">
                <button type="submit" class="btn">Daftar</button>
                <button type="reset" class="btn ghost">Reset</button>
            </div>
        </form>

        <p class="note"><span class="req">*</span> Wajib diisi.</p>
    </main>
</div>
</body>
</html>
