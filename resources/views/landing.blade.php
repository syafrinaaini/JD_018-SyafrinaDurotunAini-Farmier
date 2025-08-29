<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<script src="{{ asset('js/landing.js') }}"></script>

<body>

  <!-- Navbar -->
  <header class="navbar">
    <nav>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Gabung</a></li>
        <li><a href="{{ route('login') }}">Masuk</a></li>
        <li><a href="{{ route('register') }}">Daftar</a></li>

      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>Welcome to Farmier</h1>
      <p>Farmier – Bersama Peternak Lokal, Membangun Kemitraan dan Memperbesar Peluang Pasar..</p>
      <button class="btn">mulai sekarang</button>
    </div>
    <div class="hero-image">
      <img src="{{ asset('images/logo-farmier.png') }}" alt="Farmier Logo">
    </div>
  </section>

  <!-- Features -->
<section class="features">
  <div class="card">
    <h3>Ternak dengan Berbagai Ras</h3>
    <p>Pilih hewan ternak sesuai kebutuhan, dari peternak terpercaya Banyuwangi.</p>
  </div>
  <div class="card">
    <h3>Mitra Terpercaya</h3>
    <p>Jalin kerjasama dengan peternak dan penyedia jasa yang sudah terverifikasi.</p>
  </div>
  <div class="card">
    <h3>Proses Mudah</h3>
    <p>Temukan peternak atau ajukan kerjasama hanya dengan beberapa klik.</p>
  </div>
  <div class="card">
    <h3>Dukungan Admin</h3>
    <p>Setiap kerjasama difasilitasi dan diawasi agar tetap aman dan transparan.</p>
  </div>
</section>


     <section class="about" id="about">
  <h2 class="section-title">Tentang Farmier</h2>
  <p class="section-subtitle">Menghubungkan peternak Banyuwangi dengan vendor & pelanggan</p>

  <div class="about-row">
    <div class="about-img-box">
      <img src="{{ asset('images/about-us1.jpeg') }}" class="about-img" alt="Farm Image">
    </div>
    <div class="about-text">
      <div class="about-card">
        <h3>Mengapa Farmier?</h3>
        <p class="italic">
          Farmier hadir sebagai jembatan antara peternak dan vendor agar lebih mudah menemukan kebutuhan hewan ternak yang tepat.
        </p>
        <ul class="about-list">
          <li>🔹 Mempermudah pemasaran hewan ternak.</li>
          <li>🔹 Meningkatkan peluang kerjasama dengan vendor.</li>
          <li>🔹 Fitur chat untuk diskusi langsung.</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="about-row reverse">
    <div class="about-img-box">
      <img src="{{ asset('images/about-us2.jpg') }}" class="about-img" alt="Vendor Image">
    </div>
    <div class="about-text">
      <div class="about-card">
        <h3>Bagi Vendor</h3>
        <p class="italic">
          Vendor seperti penyedia aqiqah, katering, hingga event organizer dapat menemukan peternak terpercaya dengan lebih cepat.
        </p>
        <ul class="about-list">
          <li>🔹 Cari peternakan sesuai kualifikasi.</li>
          <li>🔹 Ajukan permintaan lewat sistem.</li>
          <li>🔹 Semua request melewati persetujuan admin.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

</body>
</html>
