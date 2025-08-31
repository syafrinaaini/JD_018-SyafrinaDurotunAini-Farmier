<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Vendor</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard-vendor.css') }}">
</head>
<body>
  <!-- Sidebar -->
  <nav>
    <div class="logo">
      <a href="#">
        <img src="{{ asset('images/logo-farmier.png') }}" alt="Farmier Logo">
      </a>
    </div>
    <ul class="nav-links">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Katalog</a></li>
      <li><a href="#">Tawaran</a></li>
      <li><a href="#">Pesan</a></li>
      <li><a href="#">Pengaturan</a></li>
    </ul>
  </nav>

  <main class="dashboard-container">
    <div class="banner">
      <img src="{{ asset('images/vendor-bg.png') }}" alt="Farmier Banner">
    </div>

    <div class="cards-wrapper">
      @forelse($farms as $farm)
        <div class="card">
          <div class="card-content">
            <h2>{{ $farm->name }}</h2>
            <p class="desc">{{ $farm->description ?? 'Tidak ada deskripsi.' }}</p>
            <p><strong>Lokasi:</strong> {{ $farm->location ?? '-' }}</p>
            <p><strong>Total Ternak:</strong> {{ $farm->livestocks->count() }}</p>
            <a href="#" class="btn">See More</a>
          </div>
          <div class="card-image">
            <img src="{{ asset('images/farm.jpg') }}" alt="Farm Image">
          </div>
        </div>
      @empty
        <p>Belum ada data peternakan.</p>
      @endforelse
    </div>
  </main>
</body>
</html>
