<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <title>itemku</title>
        <style>
            /* Palet Warna itemku:
               #F9F7F7 - Background utama
               #DBE2EF - Background secondary
               #3F72AF - Warna aksen
               #112D4E - Warna gelap
            */

            * {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            }

            body {
                background-color: #F9F7F7;
                margin: 0;
                padding: 0;
            }

            /* Navbar Styling */
            .navbar {
                background-color: #ffffff !important;
                box-shadow: 0 2px 10px rgba(17, 45, 78, 0.1);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .navbar .container {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
            }

            /* Logo Styling */
            .logo {
                font-size: 1.8rem;
                font-weight: 700;
                background: linear-gradient(135deg, #112D4E 0%, #3F72AF 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin: 0;
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            .logo:hover {
                transform: scale(1.05);
            }

            /* Search Bar */
            .form-control {
                border: 2px solid #DBE2EF;
                background-color: #F9F7F7;
                border-radius: 25px;
                padding: 10px 45px 10px 15px;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(63, 114, 175, 0.15);
                border-color: #3F72AF;
                background-color: #ffffff;
            }

            .fa-magnifying-glass {
                color: #3F72AF;
            }

            /* Nav Links */
            .nav-link {
                color: #112D4E;
                font-weight: 500;
                font-size: 1rem;
                padding: 0.5rem 1rem;
                margin: 0 0.25rem;
                border-radius: 8px;
                transition: all 0.3s ease;
                position: relative;
            }

            .nav-link:hover {
                color: #3F72AF;
                background-color: #DBE2EF;
                transform: translateY(-2px);
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 2px;
                background-color: #3F72AF;
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 80%;
            }

            /* Buttons */
            .btn-primary {
                background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
                border: none;
                color: #F9F7F7;
                font-weight: 600;
                padding: 0.5rem 1.5rem;
                border-radius: 10px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 8px rgba(63, 114, 175, 0.3);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(63, 114, 175, 0.4);
                background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
            }

            .btn-outline {
                background-color: transparent;
                border: 2px solid #3F72AF;
                color: #3F72AF;
                font-weight: 600;
                padding: 0.5rem 1.5rem;
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .btn-outline:hover {
                background-color: #3F72AF;
                color: #F9F7F7;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(63, 114, 175, 0.3);
            }

            /* Dropdown */
            .dropdown button {
                background-color: transparent;
                border: none;
                color: #112D4E;
                font-weight: 600;
                padding: 0.5rem 1rem;
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .dropdown button:hover {
                background-color: #DBE2EF;
            }

            .dropdown button .bi-person-circle {
                color: #3F72AF;
            }

            .dropdown-menu {
                border: 2px solid #DBE2EF;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(17, 45, 78, 0.15);
                margin-top: 0.5rem;
            }

            .dropdown-item {
                color: #112D4E;
                font-weight: 500;
                padding: 0.75rem 1.25rem;
                transition: all 0.3s ease;
            }

            .dropdown-item:hover {
                background-color: #DBE2EF;
                color: #3F72AF;
                padding-left: 1.5rem;
            }

            .dropdown-divider {
                border-top: 1px solid #DBE2EF;
            }

            /* Footer */
            footer {
                background-color: #112D4E;
                color: #F9F7F7;
                border-top: 4px solid #3F72AF;
            }

            footer h5,
            footer h6 {
                color: #F9F7F7;
            }

            footer .text-muted {
                color: #DBE2EF !important;
            }

            footer a.text-muted:hover {
                color: #3F72AF !important;
            }

            footer .text-dark {
                color: #F9F7F7 !important;
                font-size: 1.2rem;
                transition: all 0.3s ease;
            }

            footer .text-dark:hover {
                color: #3F72AF !important;
                transform: scale(1.2);
            }

            footer hr {
                border-color: #3F72AF;
                opacity: 0.3;
            }

            footer .small {
                color: #DBE2EF;
            }

            /* Container */
            .container-fluid {
                min-height: calc(100vh - 200px);
            }

            /* Navbar Toggler */
            .navbar-toggler {
                border: 2px solid #3F72AF;
                padding: 0.5rem;
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(63, 114, 175, 0.25);
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%233F72AF' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            /* Responsive */
            @media (max-width: 991px) {
                .nav-link {
                    text-align: center;
                    margin: 0.25rem 0;
                }

                .logo {
                    font-size: 1.5rem;
                }

                .btn-primary,
                .btn-outline {
                    width: 100%;
                    margin-top: 0.5rem;
                }

                .form-control {
                    margin-bottom: 1rem;
                }
            }

            /* Smooth Scrolling */
            html {
                scroll-behavior: smooth;
            }

            /* Link Focus States */
            a:focus,
            button:focus {
                outline: 2px solid #3F72AF;
                outline-offset: 2px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container py-3">
                <h2 class="logo">itemku</h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="ms-3 collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
                        <form action="{{ route('produk.search') }}" method="GET" class="d-flex my-2 my-lg-0 mx-lg-3 w-100 w-md-50" style="max-width:600px;">
                            <div style="position: relative; width: 500px;" class="input-group w-100">
                                <input
                                    name="q"
                                    class="form-control"
                                    type="text"
                                    placeholder="Cari produk..."
                                    aria-label="Search"
                                >
                                <i class="fa-solid fa-magnifying-glass"
                                style="
                                    position: absolute;
                                    right: 13px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    cursor: pointer;
                                "></i>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/toko">Toko</a>
                            </li>
                        </div>
                    </ul>
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>{{Auth::user()->name}}</span>
                                <i class="bi bi-person-circle fs-3 ms-3"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="/toko/toko-member" class="dropdown-item">Toko</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex gap-2">
                            <a href="/login" class="btn btn-primary">Masuk</a>
                            <a href="/register" class="btn btn-outline">Daftar</a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <div class="container-fluid m-0 p-0 min-vh-100">
            @yield('content')
        </div>
        <footer class="mt-5 py-4">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <h5 class="fw-bold">itemku</h5>
                        <p class="text-muted mb-0">Marketplace Sekolah Digital untuk memenuhi kebutuhan pendidikan dengan mudah, aman, dan terpercaya.</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="fw-semibold mb-3">Navigasi</h6>
                        <ul class="list-unstyled text-muted">
                            <li><a href="/" class="text-decoration-none text-muted">Beranda</a></li>
                            <li><a href="/produk" class="text-decoration-none text-muted">Produk</a></li>
                            <li><a href="/toko" class="text-decoration-none text-muted">Toko</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        {{-- <h6 class="fw-semibold mb-3">Kategori Populer</h6>
                        <ul class="list-unstyled text-muted">
                            <li><a href="#" class="text-decoration-none text-muted">Alat Tulis</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Seragam Sekolah</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Perlengkapan Kelas</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Buku Pelajaran</a></li>
                        </ul> --}}
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-semibold mb-3">Hubungi Kami</h6>
                        <p class="text-muted mb-1"><i class="bi bi-envelope me-2"></i>support@itemku.id</p>
                        <p class="text-muted mb-1"><i class="bi bi-telephone me-2"></i>+62 812 3456 7890</p>
                        <div class="mt-2">
                            <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-dark"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="text-center text-muted small">
                © 2025 <strong>itemku</strong>
                </div>
            </div>
        </footer>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>