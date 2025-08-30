<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Peternakan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
</head>
<body>
    <div class="wrap">
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

        <form action="{{ route('peternak.simpan') }}" method="POST" class="form">
            @csrf

            <div class="form-group">
                <label for="nama_peternak">Nama Peternak (Pemilik) <span class="req">*</span></label>
                <input type="text" id="nama_peternak" name="nama_peternak" value="{{ old('nama_peternak') }}" required>
            </div>

            <div class="form-group">
                <label for="nama_peternakan">Nama Peternakan <span class="req">*</span></label>
                <input type="text" id="nama_peternakan" name="nama_peternakan" value="{{ old('nama_peternakan') }}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email (Opsional)</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@mail.com">
                </div>

                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="08xxxx">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Peternakan <span class="req">*</span></label>
                <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Tambahan</label>
                <textarea id="keterangan" name="keterangan" rows="3" placeholder="Jenis ternak, kapasitas kandang, dll.">{{ old('keterangan') }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn">Daftar</button>
                <button type="reset" class="btn ghost">Reset</button>
            </div>
        </form>

        <p class="note"><span class="req">*</span> Wajib diisi.</p>
    </div>
</body>
</html>