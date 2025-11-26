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
    }

    /* Back Button & Header */
    .page-header {
        margin-bottom: 2rem;
        margin-top: 2rem;
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
    }

    .page-header h2 {
        color: #112D4E;
        font-weight: 700;
        font-size: 1.75rem;
    }

    /* Cards */
    .card {
        border: none;
        border-radius: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(17, 45, 78, 0.08);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 30px rgba(63, 114, 175, 0.15);
    }

    .card-body {
        padding: 2rem;
    }

    /* Main Image */
    #mainImage {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    #mainImage:hover {
        transform: scale(1.02);
    }

    /* Thumbnails */
    .thumb-img {
        height: 80px;
        width: 100%;
        object-fit: cover;
        cursor: pointer;
        border-radius: 10px;
        border: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .thumb-img:hover {
        border-color: #3F72AF;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(63, 114, 175, 0.3);
    }

    /* Product Info */
    .card-body h3 {
        color: #112D4E;
        font-weight: 700;
        font-size: 1.75rem;
        line-height: 1.3;
    }

    .price {
        color: #3F72AF;
        font-weight: 700;
        font-size: 2rem;
    }

    .badge {
        background-color: #DBE2EF !important;
        color: #112D4E;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
    }

    /* Description */
    .text-muted {
        color: #6c757d !important;
        line-height: 1.7;
        font-size: 1rem;
    }

    /* Product Details List */
    .list-unstyled li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #F9F7F7;
        color: #6c757d;
        font-size: 0.95rem;
    }

    .list-unstyled li:last-child {
        border-bottom: none;
    }

    .list-unstyled li strong {
        color: #112D4E;
        font-weight: 600;
        display: inline-block;
        min-width: 140px;
    }

    /* Buttons */
    .btn-outline-success {
        background-color: transparent;
        border: 2px solid #25D366;
        color: #25D366;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #25D366;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
    }

    .btn-primary {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        border: none;
        color: #F9F7F7;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(63, 114, 175, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(63, 114, 175, 0.4);
        background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
    }

    /* Icons */
    .bi-whatsapp {
        font-size: 1.2rem;
    }

    /* Button Container */
    .mt-auto {
        padding-top: 1rem;
        border-top: 2px solid #F9F7F7;
        margin-top: 1rem;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .card-body {
            padding: 1.5rem;
        }

        .page-header h2 {
            font-size: 1.5rem;
        }

        .price {
            font-size: 1.5rem;
        }

        #mainImage {
            max-height: 400px;
        }
    }

    @media (max-width: 576px) {
        .btn-outline-success,
        .btn-primary {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .mt-auto .d-flex {
            flex-direction: column !important;
        }

        .ms-auto {
            margin-left: 0 !important;
        }

        .thumb-img {
            height: 60px;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeIn 0.5s ease;
    }

    /* Image Gallery Effect */
    .row.g-2 {
        margin-top: 1rem;
    }

    /* Shadow Effects */
    .shadow-sm {
        box-shadow: 0 2px 10px rgba(17, 45, 78, 0.08) !important;
    }

    /* Category Badge Styling */
    .badge.bg-secondary {
        background: linear-gradient(135deg, #DBE2EF 0%, #3F72AF 50%) !important;
        color: #112D4E;
        border: none;
    }

    /* Smooth Transitions */
    * {
        transition: all 0.3s ease;
    }
</style>

<div class="container py-4">
    <div class="d-flex align-items-center page-header">
        <a href="{{ url()->previous() }}" class="btn btn-light me-3">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h2 class="mb-0">Detail Produk</h2>
    </div>

    <div class="row">
        <!-- Kolom Gambar -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img id="mainImage" 
                             src="{{$product->imageProducts->first() ? asset('storage/gambar-produk/' . $product->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/no-image.png')}}"
                             class="img-fluid"
                             alt="{{ $product->nama_produk }}">
                    </div>
                    
                    <!-- Thumbnail Gallery -->
                    @if($product->imageProducts->count() > 1)
                        <div class="row g-2">
                            @foreach ($product->imageProducts as $img)
                                <div class="col-3">
                                    <img src="{{ asset('storage/gambar-produk/' . $img->nama_gambar) }}"
                                        class="img-fluid thumb-img"
                                        data-src="{{ asset('storage/gambar-produk/' . $img->nama_gambar) }}" 
                                        alt="thumbnail">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Kolom Info Produk -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body d-flex flex-column">
                    <h3 class="mb-3">{{ $product->nama_produk }}</h3>
                    
                    <div class="mb-4">
                        <span class="price">Rp {{ number_format($product->harga,0,',','.') }}</span>
                        <span class="badge bg-secondary ms-2">
                            <i class="bi bi-box-seam me-1"></i>Stok: {{ $product->stok }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <h5 style="color: #112D4E; font-weight: 600;">Deskripsi Produk</h5>
                        <p class="text-muted">
                            {!! nl2br(e($product->deskripsi)) !!}
                        </p>
                    </div>

                    <div class="mb-4">
                        <h5 style="color: #112D4E; font-weight: 600; margin-bottom: 1rem;">Informasi Produk</h5>
                        <ul class="list-unstyled">
                            <li>
                                <strong><i class="bi bi-tag-fill me-2" style="color: #3F72AF;"></i>Kategori:</strong> 
                                {{ $product->category->nama_kategori ?? '—' }}
                            </li>
                            <li>
                                <strong><i class="bi bi-shop me-2" style="color: #3F72AF;"></i>Toko:</strong> 
                                {{ $product->store->nama_toko ?? '—' }}
                            </li>
                            <li>
                                <strong><i class="bi bi-calendar-check me-2" style="color: #3F72AF;"></i>Tanggal Upload:</strong> 
                                {{ \Carbon\Carbon::parse($product->tanggal_upload)->format('d F Y') }}
                            </li>
                            <li>
                                <strong><i class="bi bi-clock-history me-2" style="color: #3F72AF;"></i>Dibuat:</strong> 
                                {{ $product->created_at->diffForHumans() }}
                            </li>
                        </ul>
                    </div>

                    <div class="mt-auto">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="https://wa.me/{{ $product->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->nama_produk) }}" 
                               target="_blank" 
                               class="btn btn-outline-success flex-grow-1">
                                <i class="bi bi-whatsapp me-2"></i>Chat Penjual
                            </a>
                            <a href="{{ route('toko.detail', Crypt::encrypt($product->store->id)) }}" 
                               class="btn btn-primary flex-grow-1">
                                <i class="bi bi-shop me-2"></i>Lihat Toko
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('click', function(e){
            const t = e.target;
            if(t.classList.contains('thumb-img')){
                const src = t.getAttribute('data-src');
                const main = document.getElementById('mainImage');
                if(main && src) {
                    main.style.opacity = '0.5';
                    setTimeout(() => {
                        main.src = src;
                        main.style.opacity = '1';
                    }, 150);
                }
            }
        });
    </script>
@endpush
@endsection