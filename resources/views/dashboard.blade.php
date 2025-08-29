<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Vendor - Farmier</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo">Farmier</h2>
    <nav>
      <ul>
        <li><a href="#" class="active">🏠 Dashboard</a></li>
        <li><a href="#">📦 Pesanan</a></li>
        <li><a href="#">💬 Diskusi</a></li>
        <li><a href="#">⚙️ Pengaturan</a></li>
      </ul>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="content">
    <header>
      <h1>Dashboard Vendor</h1>
      <input type="text" placeholder="Cari Peternak...">
    </header>

    <!-- Daftar Peternak -->
    <section class="farmer-list">
      <article class="farmer-card">
        <h3>🐐 Peternak Domba Makmur</h3>
        <p>Varian: Domba Garut, Domba Ekor Gemuk</p>
        <button class="btn-detail">Lihat Detail</button>
      </article>

      <article class="farmer-card">
        <h3>🐄 Sapi Jaya</h3>
        <p>Varian: Sapi Bali, Sapi Limousin</p>
        <button class="btn-detail">Lihat Detail</button>
      </article>

      <article class="farmer-card">
        <h3>🐓 Ayam Unggul</h3>
        <p>Varian: Ayam Kampung, Ayam Broiler</p>
        <button class="btn-detail">Lihat Detail</button>
      </article>
    </section>
  </main>
</body>
</html>
