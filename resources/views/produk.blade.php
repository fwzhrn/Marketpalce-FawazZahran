@extends('navbar')
@section('content')
<style>
    /* Palet Warna itemku:
       #F9F7F7 - Background utama
       #DBE2EF - Background secondary
       #3F72AF - Warna aksen
       #112D4E - Warna gelap
    */

    /* Header Section */
    .page-header {
        background: linear-gradient(135deg, #112D4E 0%, #3F72AF 100%);
        padding: 3rem 0;
        margin-bottom: 3rem;
        border-radius: 0 0 30px 30px;
    }

    .page-header h2 {
        color: #F9F7F7;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: #DBE2EF;
        font-size: 1.1rem;
    }

    /* Filter Card */
    .filter-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px rgba(17, 45, 78, 0.1);
        position: sticky;
        top: 100px;
    }

    .filter-card h6 {
        color: #112D4E;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #DBE2EF;
    }

    /* Nav Pills */
    .nav-pills .nav-link {
        color: #112D4E;
        background-color: transparent;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-bottom: 0.5rem;
    }

    .nav-pills .nav-link:hover {
        background-color: #DBE2EF;
        color: #3F72AF;
        transform: translateX(5px);
    }

    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%) !important;
        color: #F9F7F7 !important;
        box-shadow: 0 4px 12px rgba(63, 114, 175, 0.3);
        transform: translateX(5px);
    }

    /* Product Cards */
    .card {
        border: none;
        border-radius: 15px;
        background-color: #ffffff;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(63, 114, 175, 0.2) !important;
    }

    .card-img-top {
        border-radius: 15px 15px 0 0;
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.1);
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-title {
        color: #112D4E;
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.4;
    }

    .card-body strong {
        color: #3F72AF;
        font-size: 1.2rem;
        font-weight: 700;
    }

    /* Button Primary */
    .btn-primary {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        border: none;
        color: #F9F7F7;
        font-weight: 600;
        padding: 0.75rem 1rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(63, 114, 175, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(63, 114, 175, 0.4);
        background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
    }

    .btn-primary .bi-whatsapp {
        color: #25D366 !important;
    }

    /* Stock Info */
    .text-muted.small {
        color: #6c757d;
        font-weight: 500;
    }

    /* Empty State */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state i {
        font-size: 4rem;
        color: #DBE2EF;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #6c757d;
        font-size: 1.1rem;
    }

    /* Button Group */
    .card .d-flex.p-2 {
        background-color: #F9F7F7;
        border-top: 1px solid #DBE2EF;
    }

    /* Container */
    .container {
        max-width: 1200px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .page-header h2 {
            font-size: 1.75rem;
        }

        .filter-card {
            position: relative;
            top: 0;
            margin-bottom: 2rem;
        }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeInUp 0.5s ease;
    }

    /* Link Hover */
    .nav-link img {
        transition: opacity 0.3s ease;
    }

    .nav-link:hover img {
        opacity: 0.9;
    }

    /* Shadow Utilities */
    .shadow-sm {
        box-shadow: 0 2px 10px rgba(17, 45, 78, 0.08) !important;
    }

    /* Scroll Behavior */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="text-center">
            <h2 class="fw-bold">Semua Produk</h2>
            <p class="mb-0">Temukan berbagai kebutuhan sekolah dari penjual terpercaya di itemku</p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <!-- NAV PILLS KATEGORI -->
        <div class="col-md-3 mb-4">
            <div class="filter-card">
                <h6>Kategori</h6>
                <ul class="nav nav-pills">
                    @foreach ($category as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                data-bs-toggle="pill"
                                href="#kategori{{ $item->id }}">
                                <i class="bi bi-tag-fill me-2"></i>
                                {{ $item->nama_kategori ?? $item->name ?? 'Kategori' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- TAB CONTENT PRODUK -->
        <div class="col-md-9">
            <div class="tab-content">
                @foreach ($category as $key => $item_category)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="kategori{{ $item_category->id }}">
                        <div class="row g-4">
                            @forelse ($item_category->products as $p)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="card h-100 shadow-sm">
                                        <a href="{{ route('produk.detail', Crypt::encrypt($p->id)) }}" class="nav-link">
                                            <img src="{{ $p->imageProducts->first()
                                                ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar)
                                                : asset('asset/image/SkoolaAssets/no-image.png') }}"
                                                class="card-img-top"
                                                alt="{{ $p->nama_produk }}"
                                                style="object-fit:cover; height:220px;">
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title mb-2">{{ Str::limit($p->nama_produk, 50, '...') }}</h6>
                                            <p class="text-muted small mb-2">
                                                <i class="bi bi-box-seam me-1"></i>
                                                Stok: {{ $p->stok }}
                                            </p>
                                            <strong class="d-block mb-2">
                                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                                            </strong>
                                        </div>
                                        <div class="d-flex p-2">
                                            <a href="https://wa.me/{{ $p->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" 
                                               class="btn btn-primary w-100">
                                                <i class="bi bi-whatsapp me-2"></i>
                                                Chat Penjual
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        <p class="mb-0">Belum ada produk di kategori ini</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection