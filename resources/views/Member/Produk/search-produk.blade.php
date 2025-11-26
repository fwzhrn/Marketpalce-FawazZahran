@extends('navbar')
@section('content')
<style>
    /* Palet Warna itemku:
       #F9F7F7 - Background utama
       #DBE2EF - Background secondary
       #3F72AF - Warna aksen
       #112D4E - Warna gelap
    */

    .container {
        max-width: 1200px;
        padding-top: 2rem;
        padding-bottom: 3rem;
    }

    /* Header Section */
    .page-header {
        margin-bottom: 2rem;
        margin-top: 2rem;
        animation: fadeInDown 0.5s ease;
    }

    .btn-light {
        background-color: #DBE2EF;
        border: 2px solid #3F72AF;
        color: #112D4E;
        font-weight: 600;
        border-radius: 10px;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: #3F72AF;
        color: #F9F7F7;
        transform: translateX(-5px);
        box-shadow: 0 4px 12px rgba(63, 114, 175, 0.3);
    }

    .page-header h2 {
        color: #112D4E;
        font-weight: 400;
        font-size: 1.5rem;
    }

    .page-header h2 strong {
        color: #3F72AF;
        font-weight: 700;
    }

    /* Product Cards */
    .card {
        border: none;
        border-radius: 15px;
        background-color: #ffffff;
        transition: all 0.3s ease;
        overflow: hidden;
        animation: fadeInUp 0.5s ease;
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
        min-height: 2.8rem;
    }

    .card-body strong {
        color: #3F72AF;
        font-size: 1.2rem;
        font-weight: 700;
    }

    /* Stock Info */
    .text-muted.small {
        color: #6c757d;
        font-weight: 500;
    }

    .small i {
        color: #3F72AF;
    }

    /* Button */
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
        font-size: 1.1rem;
    }

    /* Button Container */
    .card .d-flex.p-2 {
        background-color: #F9F7F7;
        border-top: 1px solid #DBE2EF;
        padding: 0.75rem !important;
    }

    /* Empty State */
    .empty-state {
        padding: 5rem 2rem;
        text-align: center;
        animation: fadeIn 0.6s ease;
    }

    .empty-state i {
        font-size: 5rem;
        color: #DBE2EF;
        margin-bottom: 1.5rem;
        display: block;
    }

    .empty-state h4 {
        color: #112D4E;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .empty-state .btn-search {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        color: #F9F7F7;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .empty-state .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(63, 114, 175, 0.4);
    }

    /* Shadow */
    .shadow-sm {
        box-shadow: 0 2px 10px rgba(17, 45, 78, 0.08) !important;
    }

    /* Link Hover */
    .nav-link {
        transition: opacity 0.3s ease;
    }

    .nav-link:hover {
        opacity: 0.9;
    }

    /* Grid */
    .row.g-4 {
        margin-bottom: 2rem;
    }

    /* Result Counter */
    .result-info {
        background: linear-gradient(135deg, #DBE2EF 0%, #F9F7F7 100%);
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #3F72AF;
    }

    .result-info p {
        margin: 0;
        color: #112D4E;
        font-weight: 500;
    }

    .result-info strong {
        color: #3F72AF;
    }

    /* Animations */
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

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header h2 {
            font-size: 1.2rem;
        }

        .card-img-top {
            height: 180px !important;
        }

        .empty-state {
            padding: 3rem 1rem;
        }

        .empty-state i {
            font-size: 3.5rem;
        }
    }

    @media (max-width: 576px) {
        .page-header h2 {
            font-size: 1rem;
        }

        .btn-light {
            padding: 0.4rem 0.8rem;
        }
    }

    /* Stagger Animation for Cards */
    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }
    .card:nth-child(5) { animation-delay: 0.5s; }
    .card:nth-child(6) { animation-delay: 0.6s; }
    .card:nth-child(7) { animation-delay: 0.7s; }
    .card:nth-child(8) { animation-delay: 0.8s; }
</style>

<div class="container">
    <div class="d-flex align-items-center page-header">
        <a href="{{ url()->previous() }}" class="btn btn-light me-3">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h2 class="mb-0">Hasil Pencarian: <strong>"{{ $keyword }}"</strong></h2>
    </div>

    @if($products->count() > 0)
        <div class="result-info">
            <p>
                <i class="bi bi-search me-2" style="color: #3F72AF;"></i>
                Ditemukan <strong>{{ $products->count() }}</strong> produk untuk pencarian 
                <strong>"{{ $keyword }}"</strong>
            </p>
        </div>
    @endif

    <div class="row g-4">
        @forelse ($products as $p)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    <a href="{{ route('produk.detail', Crypt::encrypt($p->id)) }}" class="nav-link">
                        <img src="{{ $p->imageProducts->first()
                                        ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar)
                                        : asset('asset/image/SkoolaAssets/no-image.png') }}"
                                class="card-img-top"
                                alt="{{ $p->nama_produk }}"
                                style="object-fit:cover; height:200px;">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title mb-2">{{ Str::limit($p->nama_produk, 50, '...') }}</h6>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-box-seam me-1"></i>
                            Stok: {{ $p->stok }}
                        </p>
                        <strong class="d-block">
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
                    <i class="bi bi-search"></i>
                    <h4>Produk Tidak Ditemukan</h4>
                    <p>Maaf, kami tidak menemukan produk yang sesuai dengan pencarian "<strong>{{ $keyword }}</strong>"</p>
                    <a href="/produk" class="btn btn-search">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                        Jelajahi Semua Produk
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection