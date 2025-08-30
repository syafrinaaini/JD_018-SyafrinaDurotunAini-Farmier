<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peternak</title>
    <link rel="stylesheet" href="{{ asset('css/peternakdashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="dashboard">

    {{-- Sidebar --}}
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo-farmier.png') }}" alt="Logo">
        </div>
        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('livestocks.index') }}">Manajemen Ternak</a></li>
            <li><a href="#">Tawaran</a></li>
            <li><a href="#">Pesan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </aside>

    {{-- Konten --}}
    <main class="content">

        {{-- Welcome --}}
        <div class="welcome">
            <div class="welcome-left">
                <img src="{{ asset('images/peternak-db.png') }}" alt="Ilustrasi" />
            </div>
            <div class="welcome-right">
                <h1>Selamat Datang Kembali, Genjah Arum Farm!</h1>
                <p class="subtitle">
                    Setiap langkah yang kamu ambil hari ini adalah bagian dari perjalanan menuju peternakan
                    yang lebih maju, produktif, dan berkelanjutan.
                </p>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="statistik">
            <div class="card">
                <h3>Jumlah Ternak</h3>
                <p>{{ $jumlahTernak ?? 0 }}</p>
            </div>
            <div class="card">
                <h3>Jumlah Tawaran</h3>
                <p>{{ $jumlahTawaran ?? 0 }}</p>
            </div>
            <div class="card">
                <h3>Ternak Unggulan</h3>
                <p>{{ $ternakUnggulan?->nama ?? '-' }}</p>
            </div>
        </div>

        {{-- Quick Action --}}
        <div class="quick-action">
            <div class="quick-action">
                <a href="{{ route('farms.index') }}" class="btn btn-primary">+ Buat Lapak</a>
            </div>

            @if(Route::has('livestock.create'))
                <a href="{{ route('livestock.create') }}" class="btn btn-success">+ Tambah Ternak</a>
            @else
                <a href="#" class="btn btn-success disabled">+ Tambah Ternak</a>
            @endif
        </div>

        {{-- Grafik --}}
        <div class="grafik">
            <h3>Grafik Kunjungan (7 Hari Terakhir)</h3>
            <canvas id="kunjunganChart"></canvas>
        </div>

        {{-- Aktivitas --}}
        <div class="aktivitas">
            <h3>Aktivitas Terbaru</h3>
            <ul>
                @forelse($activities ?? [] as $activity)
                    <li>{{ $activity->deskripsi }} <small>({{ $activity->created_at->diffForHumans() }})</small></li>
                @empty
                    <li>Belum ada aktivitas terbaru.</li>
                @endforelse
            </ul>
        </div>

    </main>
</div>

<script>
    const ctx = document.getElementById('kunjunganChart');
    if(ctx){
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($kunjungan->keys() ?? []) !!},
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode($kunjungan->values() ?? []) !!},
                    borderWidth: 2,
                    borderColor: '#ff9800',
                    backgroundColor: 'rgba(255, 152, 0, 0.3)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });
    }
</script>
</body>
</html>
