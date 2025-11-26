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

    /* Store Cards */
    .card {
        border: none;
        border-radius: 15px;
        background-color: #ffffff;
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 1.5rem;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(63, 114, 175, 0.2) !important;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        color: #112D4E;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }

    /* Store Image Container */
    .store-image-container {
        width: 54px;
        height: 54px;
        border-radius: 12px;
        background-color: #DBE2EF;
        border: 2px solid #3F72AF;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .card:hover .store-image-container {
        transform: rotate(5deg) scale(1.05);
        border-color: #112D4E;
    }

    .store-image-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    /* Icons */
    .bi-geo-alt-fill,
    .fa-brands.fa-whatsapp,
    .fa-solid.fa-user {
        color: #3F72AF !important;
    }

    /* Small Text */
    small {
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 500;
    }

    small i {
        font-size: 1rem;
    }

    /* Button */
    .btn-dark {
        background: linear-gradient(135deg, #112D4E 0%, #3F72AF 100%);
        border: none;
        color: #F9F7F7;
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(17, 45, 78, 0.3);
        margin-top: 0.75rem;
    }

    .btn-dark:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 4px 12px rgba(63, 114, 175, 0.4);
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        color: #F9F7F7;
    }

    /* Layout Spacing */
    .card-body .d-flex {
        gap: 0.5rem;
    }

    /* Shadow */
    .shadow-sm {
        box-shadow: 0 2px 10px rgba(17, 45, 78, 0.08) !important;
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

        .card {
            margin-bottom: 1rem;
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

    /* Store Info Section */
    .store-info {
        border-top: 1px solid #DBE2EF;
        padding-top: 0.75rem;
        margin-top: 0.75rem;
    }

    /* Grid Gap */
    .row {
        gap: 1rem 0;
    }

    /* Card Header */
    .card-header-section {
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #F9F7F7;
        margin-bottom: 0.75rem;
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="text-center">
            <h2 class="fw-bold">Semua Toko</h2>
            <p class="mb-0">Temukan berbagai kebutuhan sekolah dari penjual terpercaya di itemku</p>
        </div>
    </div>
</div>

<section class="container mb-5">
    <div class="row g-3">
        @foreach ($stores as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="card-header-section">
                            <div class="d-flex align-items-start">
                                <div class="store-image-container me-3">
                                    <img src="{{ asset('storage/gambar-toko/' . $item->gambar) }}" alt="{{ $item->nama_toko }}">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title">{{ $item->nama_toko }}</h5>
                                    <small>
                                        <i class="bi bi-geo-alt-fill me-1"></i>
                                        {{ $item->alamat }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex-grow-1">
                            <div class="mb-2">
                                <small>
                                    <i class="fa-brands fa-whatsapp me-2"></i>
                                    {{ $item->kontak_toko }}
                                </small>
                            </div>
                            <div class="mb-2">
                                <small>
                                    <i class="fa-solid fa-user me-2"></i>
                                    {{ $item->user->name }}
                                </small>
                            </div>
                        </div>
                        
                        <div class="mt-auto">
                            <a href="{{ route('toko.detail', Crypt::encrypt($item->id)) }}" class="btn btn-dark w-100">
                                <i class="bi bi-shop me-2"></i>Kunjungi Toko
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection