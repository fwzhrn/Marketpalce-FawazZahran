@extends('Administrator.sidebar')
@section('content')
<style>
    /* Palet Warna itemku:
       #F9F7F7 - Background utama
       #DBE2EF - Background secondary
       #3F72AF - Warna aksen
       #112D4E - Warna gelap
    */

    .container {
        padding: 2rem;
    }

    /* Header */
    h2.fw-bold {
        color: #112D4E;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    h2.fw-bold::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #3F72AF, #112D4E);
        border-radius: 2px;
    }

    /* Stats Cards */
    .card {
        background: linear-gradient(135deg, #ffffff 0%, #F9F7F7 100%);
        border: none;
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(17, 45, 78, 0.08);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #3F72AF 0%, #112D4E 100%);
        transition: height 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 40px rgba(63, 114, 175, 0.2);
    }

    .card:hover::before {
        height: 8px;
    }

    /* Card Content */
    .card h3 {
        font-size: 3rem;
        font-weight: 700;
        color: #3F72AF;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .card:hover h3 {
        transform: scale(1.1);
        color: #112D4E;
    }

    .card p {
        font-size: 1.1rem;
        font-weight: 600;
        color: #112D4E;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Icon Decoration */
    .card-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size: 4rem;
        color: #DBE2EF;
        opacity: 0.3;
        transition: all 0.3s ease;
    }

    .card:hover .card-icon {
        opacity: 0.5;
        transform: rotate(15deg) scale(1.1);
    }

    /* Different Card Colors */
    .card-users::before {
        background: linear-gradient(90deg, #3F72AF 0%, #5b8fc9 100%);
    }

    .card-products::before {
        background: linear-gradient(90deg, #112D4E 0%, #2d5a8f 100%);
    }

    .card-stores::before {
        background: linear-gradient(90deg, #3F72AF 0%, #112D4E 100%);
    }

    /* Grid Layout */
    .row.g-4 {
        margin-top: 1rem;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger Animation */
    .col-md-4:nth-child(1) .card {
        animation-delay: 0.1s;
    }

    .col-md-4:nth-child(2) .card {
        animation-delay: 0.2s;
    }

    .col-md-4:nth-child(3) .card {
        animation-delay: 0.3s;
    }

    /* Welcome Message */
    .welcome-section {
        background: linear-gradient(135deg, #112D4E 0%, #3F72AF 100%);
        padding: 2rem;
        border-radius: 20px;
        margin-bottom: 2rem;
        color: #F9F7F7;
        box-shadow: 0 8px 30px rgba(17, 45, 78, 0.2);
    }

    .welcome-section h3 {
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #F9F7F7;
    }

    .welcome-section p {
        margin: 0;
        color: #DBE2EF;
        font-size: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        h2.fw-bold {
            font-size: 1.5rem;
        }

        .card h3 {
            font-size: 2.5rem;
        }

        .card {
            padding: 1.5rem;
        }

        .card-icon {
            font-size: 3rem;
        }

        .welcome-section {
            padding: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .card h3 {
            font-size: 2rem;
        }

        .card p {
            font-size: 0.95rem;
        }
    }

    /* Additional Stats Info */
    .stats-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #6c757d;
    }

    .stats-badge {
        background-color: #DBE2EF;
        color: #112D4E;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Hover Glow Effect */
    .card::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(63, 114, 175, 0.1);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .card:hover::after {
        width: 400px;
        height: 400px;
    }

    /* Text Center */
    .text-center {
        position: relative;
        z-index: 1;
    }
</style>

<div class="container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h3>
            <i class="bi bi-speedometer2 me-2"></i>Dashboard itemku
        </h3>
        <p>Selamat datang di panel administrator. Berikut adalah ringkasan data terkini.</p>
    </div>

    <h2 class="fw-bold">Statistik Utama</h2>
    
    <div class="row g-4">
        <!-- Card Pengguna -->
        <div class="col-md-4 col-sm-6">
            <div class="card card-users text-center">
                <i class="bi bi-people-fill card-icon"></i>
                <h3>{{$user->count()}}</h3>
                <p>Pengguna</p>
                <span class="stats-badge">Total Terdaftar</span>
            </div>
        </div>

        <!-- Card Produk -->
        <div class="col-md-4 col-sm-6">
            <div class="card card-products text-center">
                <i class="bi bi-box-seam-fill card-icon"></i>
                <h3>{{$produk->count()}}</h3>
                <p>Produk</p>
                <span class="stats-badge">Total Listing</span>
            </div>
        </div>

        <!-- Card Toko -->
        <div class="col-md-4 col-sm-6">
            <div class="card card-stores text-center">
                <i class="bi bi-shop-window card-icon"></i>
                <h3>{{$store->count()}}</h3>
                <p>Toko</p>
                <span class="stats-badge">Total Aktif</span>
            </div>
        </div>
    </div>
</div>
@endsection