<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Ternak - Farmier</title>
    <link rel="stylesheet" href="{{ asset('css/manajementernak.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal_create.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo-farmier.png') }}" alt="Farmier Logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('peternak.dashboard') }}">Dashboard</a></li>
                <li><a href="#" class="active">Manajemen Ternak</a></li>
                <li><a href="#">Tawaran</a></li>
                <li><a href="#">Pesan</a></li>
                <li><a href="#">Pengaturan</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <header class="header">
            <h1>Hallo, Breeder</h1>
            <div class="cards">
                <div class="card">
                    <p class="label">Ras Ternak</p>
                    <p class="value">{{ $totalRas ?? 0 }}</p>
                </div>
                <div class="card">
                    <p class="label">Jumlah Ternak</p>
                    <p class="value">{{ $jumlahTernak ?? 0 }}</p>
                </div>
                <div class="card">
                    <p class="label">Ternak Populer</p>
                    <p class="value">{{ $ternakPopuler ?? '-' }}</p>
                </div>
            </div>
        </header>

        <!-- Table -->
        <section class="table-section">
            <div class="table-header">
                <h2>Ternakmu Saat ini!</h2>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Ras</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($livestocks ?? [] as $item)
                    <tr>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->ras }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            @if($item->image_path)
                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="gambar" class="img-thumbnail">
                            @else
                                -
                            @endif
                        </td>
                        <td class="aksi">
                            <!-- Tombol Edit -->
                            <a href="{{ route('livestocks.edit', $item) }}" class="btn-edit">
                                <img src="{{ asset('icons/edit-button.svg') }}" alt="Edit" class="icon"> Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('livestocks.destroy', $item) }}" method="POST" class="inline-form" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <img src="{{ asset('icons/delete-button.svg') }}" alt="Hapus" class="icon"> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        <!-- Tambah Ternak -->
        <div class="tambah-ternak">
            <p class="footer-text">Ramein Ternak Lagi Yuk!</p>
            <button class="btn-add btn-tambah" id="openModal">+ Tambah Ternak</button>
        </div>

        <!-- Modal Include -->
        @include('peternakpage.modal_create')

    </main>

    <!-- JS -->
    <script src="{{ asset('js/modal_create.js') }}"></script>
</body>
</html>
