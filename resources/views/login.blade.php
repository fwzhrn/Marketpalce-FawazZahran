<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Login — itemku</title>
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <style>
            /* Palet Warna itemku:
               #F9F7F7 - Background utama
               #DBE2EF - Background secondary
               #3F72AF - Warna aksen
               #112D4E - Warna gelap
            */

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #112D4E 0%, #3F72AF 50%, #DBE2EF 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .page-center {
                width: 100%;
                max-width: 450px;
                padding: 20px;
            }

            .login-card {
                background-color: #F9F7F7;
                border-radius: 20px;
                padding: 40px 35px;
                box-shadow: 0 10px 40px rgba(17, 45, 78, 0.3);
                transition: transform 0.3s ease;
            }

            .login-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 50px rgba(17, 45, 78, 0.4);
            }

            .login-card h3 {
                color: #112D4E;
                font-weight: 700;
                font-size: 2rem;
                margin-bottom: 1.5rem;
                position: relative;
                padding-bottom: 10px;
            }

            .login-card h3::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, #3F72AF, #112D4E);
                border-radius: 2px;
            }

            .form-control {
                border: 2px solid #DBE2EF;
                border-radius: 10px;
                padding: 12px 15px;
                font-size: 0.95rem;
                transition: all 0.3s ease;
                background-color: #ffffff;
            }

            .form-control:focus {
                border-color: #3F72AF;
                box-shadow: 0 0 0 0.2rem rgba(63, 114, 175, 0.15);
                background-color: #ffffff;
            }

            .form-control::placeholder {
                color: #a0a0a0;
            }

            label {
                color: #112D4E;
                font-weight: 600;
                margin-bottom: 8px;
                font-size: 0.9rem;
            }

            .btn-login {
                background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
                color: #F9F7F7;
                border: none;
                border-radius: 10px;
                padding: 12px;
                font-weight: 600;
                font-size: 1rem;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(63, 114, 175, 0.3);
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(63, 114, 175, 0.4);
                background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
                color: #F9F7F7;
            }

            .btn-login:active {
                transform: translateY(0);
            }

            .alert {
                border-radius: 10px;
                border: none;
                padding: 12px 15px;
                font-size: 0.9rem;
            }

            .alert-success {
                background-color: #d4edda;
                color: #155724;
                border-left: 4px solid #28a745;
            }

            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
                border-left: 4px solid #dc3545;
            }

            .alert ul {
                padding-left: 20px;
            }

            .text-register {
                font-size: 0.9rem;
            }

            .text-register a {
                color: #3F72AF;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .text-register a:hover {
                color: #112D4E;
                text-decoration: underline;
            }

            .text-muted {
                color: #6c757d !important;
            }

            .mb-3 {
                margin-bottom: 1.5rem;
            }

            /* Responsive Design */
            @media (max-width: 576px) {
                .login-card {
                    padding: 30px 25px;
                }

                .login-card h3 {
                    font-size: 1.6rem;
                }

                .page-center {
                    padding: 15px;
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

            .login-card {
                animation: fadeInUp 0.6s ease;
            }

            /* Close button style */
            .btn-close {
                filter: brightness(0.8);
            }

            .btn-close:hover {
                filter: brightness(0.5);
            }

            /* Icon styling */
            .fa-check-circle {
                color: #28a745;
            }

            .fa-triangle-exclamation {
                color: #dc3545;
            }
        </style>
    </head>
    <body>
        <div class="page-center">
            <div class="login-card">
                <h3 class="text-center mb-3">Masuk</h3>
                <form action="{{route('login.post')}}" method="POST">
                    @if (Session::get('pesan'))
                        <div class="alert alert-success alert-dismissible fade show mb-1 mt-2" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ Session::get('pesan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>  
                    @endif
                    @if (Session::get('pesaneror'))
                        <div class="alert alert-danger alert-dismissible fade show mb-1 mt-2" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>
                            {{ Session::get('pesaneror') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>  
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-login">Masuk</button>
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-center gap-3 text-center py-3">
                    <div class="text-register text-center">
                        <a href="/">Kembali</a>
                    </div>
                    <div class="text-register text-center">
                        <label for="">|</label>
                    </div>
                    <div class="text-register text-center">
                        <small class="text-muted">Belum punya akun? </small>
                        <a href="/register">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>