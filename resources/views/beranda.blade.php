@extends('navbar')
@section('content')
<style>
:root{
    --accent-1: #3F72AF;
    --accent-2: #112D4E;
    --bg: #F9F7F7;
    --muted: #6c757d;
    --section-gap: 1.5rem;

    /* tinggi navbar jika fixed */
    --navbar-height: 64px;
}

body {
    background-color: var(--bg);
    margin: 0;
}

/* Kontainer utama — lebar maksimum sama dengan halaman produk */
.container {
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1rem;
    padding-right: 1rem;
    padding-bottom: var(--section-gap);
}

/* Hapus padding-top untuk container pertama agar tidak dobel */
.container:first-of-type {
    padding-top: 0;
}

/* Geser isi jika navbar fixed */
.site-content {
    padding-top: max(8px, calc(var(--navbar-height) - 24px));
}

/* Jumbotron (header besar) */
.jumbotron {
    background: linear-gradient(135deg, var(--accent-2) 0%, var(--accent-1) 100%);
    color: #F9F7F7;
    padding: 2.25rem 1.5rem;
    border-radius: 0 0 30px 30px;
    box-shadow: 0 8px 20px rgba(17, 45, 78, 0.18);
    margin-bottom: 1.25rem;
}

.jumbotron h1 {
    color: #F9F7F7;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
}

.jumbotron .lead {
    color: #DBE2EF;
    font-size: 1.05rem;
}

.jumbotron hr {
    border-top: 1px solid #DBE2EF;
    opacity: 0.6;
}

/* Tombol utama */
.btn-primary {
    background-color: var(--accent-1);
    border-color: var(--accent-1);
    color: #F9F7F7;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 8px;
    transition: all 0.22s ease;
}

.btn-primary:hover {
    background-color: #2d5a8f;
    border-color: #2d5a8f;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(63, 114, 175, 0.22);
}

/* Tombol "Lihat Semua" */
.btn-lihat {
    background-color: #DBE2EF;
    color: var(--accent-2);
    border: 2px solid var(--accent-1);
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 8px;
    transition: all 0.22s ease;
}

.btn-lihat:hover {
    background-color: var(--accent-1);
    color: #F9F7F7;
    border-color: var(--accent-1);
    transform: translateY(-2px);
}

/* Card dasar */
.card {
    border: none;
    border-radius: 12px;
    background-color: #ffffff;
    transition: all 0.22s ease;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(63, 114, 175, 0.12) !important;
}

.card-title {
    color: var(--accent-2);
    font-weight: 600;
    font-size: 1rem;
}

.card-body {
    padding: 1.15rem;
}

/* Tombol "Kunjungi" pada kartu toko */
.btn-dark {
    background-color: var(--accent-2);
    border-color: var(--accent-2);
    color: #F9F7F7;
    border-radius: 6px;
    font-weight: 500;
}

/* Gaya gambar pada kartu */
.card-img-top {
    border-radius: 12px 12px 0 0;
    transition: transform 0.22s ease;
}

.card:hover .card-img-top {
    transform: scale(1.03);
}

/* Ikon di kartu toko */
.card-body .rounded-3 {
    background-color: #DBE2EF;
    border: 2px solid var(--accent-1);
}

/* Harga */
.card-body strong {
    color: var(--accent-1);
    font-size: 1.05rem;
}

/* Tombol WA (opsional ikon) */
.btn-primary .bi-whatsapp {
    color: #25D366 !important;
}

/* Warna ikon */
.bi-geo-alt-fill,
.fa-brands.fa-whatsapp,
.fa-solid.fa-user {
    color: var(--accent-1);
}

/* Teks kecil */
small.text-muted {
    color: var(--muted) !important;
    font-size: 0.875rem;
}

/* Bayangan kecil */
.shadow-sm {
    box-shadow: 0 2px 8px rgba(17, 45, 78, 0.06) !important;
}

/* Nav pill hover ringan */
.nav-link.nav-pill,
.nav-pills .nav-link {
    transition: opacity 0.18s ease;
}

.nav-link.nav-pill:hover,
.nav-pills .nav-link:hover {
    opacity: 0.85;
}

/* Link produk tidak mewarisi style nav bootstrap */
a.product-link { text-decoration: none; color: inherit; display: block; }
a.product-link:hover { opacity: 0.95; }

/* Info stok */
.card-body .small {
    color: var(--muted);
    font-weight: 500;
}

/* Spacing utilitas */
.mt-lg-5 {
    margin-top: 3rem !important;
}

@media (max-width: 768px) {
    .jumbotron {
        padding: 1.5rem;
    }
    
    .jumbotron h1 {
        font-size: 2rem;
    }
    
    .mt-lg-5 {
        margin-top: 1.5rem !important;
    }

    /* Kurangi offset di mobile */
    .site-content { padding-top: calc(56px - 8px); }

    .container:first-of-type { padding-top: 0; }
}

/* Tombol grup di kartu produk */
.card .d-flex.p-2 {
    background-color: var(--bg);
    border-top: 1px solid #DBE2EF;
}

/* Hover nama toko */
.card-title:hover {
    color: var(--accent-1);
    transition: color 0.2s ease;
}
</style>

<main class="site-content">
    <section class="container">
        <div class="jumbotron">
            <h1 class="display-4">itemku</h1>
            <p class="lead">Tempat terbaik untuk belanja disekolah secara mudah, aman, dan terpercaya.</p>
            <hr class="my-4">
            <p>Lengkapi kebutuhan sekolahmu, dari alat tulis hingga seragam, hanya di itemku!</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/produk" role="button">Mulai Belanja</a>
            </p>
        </div>
    </section>

    <!-- Produk terbaru -->
    <section class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-start justify-content-between mb-3">
            <div class="mb-2 mb-md-0">
                <h2 class="h3 mb-2">Produk Terbaru</h2>
                <p class="text-muted mb-0">Temukan berbagai kebutuhan sekolah terbaru di itemku.</p>
            </div>
            <div class="align-self-md-center">
                <a href="/produk" class="btn btn-lihat">Lihat Semua</a>
            </div>
        </div>

        <div class="row g-3">
            @foreach($products as $p)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Gunakan product-link agar tidak terpengaruh nav -->
                        <a href="{{ route('produk.detail', Crypt::encrypt($p->id)) }}" class="product-link">
                            <img src="{{ $p->imageProducts->first() ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/no-image.png') }}" 
                                 class="card-img-top" 
                                 alt="{{ $p->nama_produk }}" 
                                 style="object-fit:cover; height:200px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ Str::limit($p->nama_produk, 50, '....') }}</h5>
                            <p class="text-muted small mb-2">Stok: {{ $p->stok }}</p>
                            <strong class="text-dark d-block mb-2">Rp {{ number_format($p->harga, 0, ',', '.') }}</strong>
                        </div>
                        <div class="d-flex p-2">
                            <a href="https://wa.me/{{ $p->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" 
                               class="btn btn-primary w-100">
                                <i class="bi bi-whatsapp me-2"></i> Chat Penjual
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Toko terbaru -->
    <section class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-start justify-content-between mb-3">
            <div class="mb-2 mb-md-0">
                <h2 class="h3 mb-2">Toko Terbaru</h2>
                <p class="text-muted mb-0">Jelajahi berbagai toko yang menawarkan kebutuhan sekolah terbaik untukmu.</p>
            </div>
            <div class="align-self-md-center">
                <a href="/toko" class="btn btn-lihat">Lihat Semua</a>
            </div>
        </div>

        <div class="row g-3">
            @foreach ($stores as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start mb-3">
                                <div class="rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width:54px;height:54px;overflow:hidden;">
                                    <!-- Gambar toko -->
                                    <img src="{{ asset('storage/gambar-toko/' . $item->gambar) }}"
                                        style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $item->nama_toko }}">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-1">{{ $item->nama_toko }}</h5>
                                    <small class="text-muted">
                                        <i class="bi bi-geo-alt-fill me-1"></i>{{ $item->alamat }}
                                    </small>
                                </div>
                            </div>
                            <small class="text-muted d-block mb-2">
                                <i class="fa-brands fa-whatsapp me-2"></i>{{ $item->kontak_toko }}
                            </small>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <small class="text-muted">
                                    <i class="fa-solid fa-user me-2"></i>{{ $item->user->name }}
                                </small>
                                <a href="{{ route('toko.detail', Crypt::encrypt($item->id)) }}"
                                   class="btn btn-dark btn-sm">Kunjungi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
