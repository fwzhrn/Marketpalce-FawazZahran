<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>itemku</title>

         <!-- Core assets (local preferred) -->
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- DataTables (bundle single file) -->
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>

        <style>
            :root {
                --bg-main: #F9F7F7;
                --bg-secondary: #DBE2EF;
                --accent: #3F72AF;
                --accent-dark: #112D4E;
                --radius-sm: 8px;
                --radius-md: 10px;
                --radius-lg: 14px;
                --shadow-sm: 0 2px 8px rgba(17,45,78,0.08);
                --shadow-md: 0 6px 20px rgba(17,45,78,0.12);
                --sidebar-width: 250px;
            }

            html, body {
                height: 100%;
                margin: 0;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                background: var(--bg-main);
                color: #0f1720;
            }

            .sidebar {
                width: var(--sidebar-width);
                min-height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 1rem 0.75rem;
                background: linear-gradient(180deg, var(--accent-dark) 0%, var(--accent) 100%);
                color: #ffffff;
                box-shadow: 4px 0 18px rgba(17,45,78,0.22);
                z-index: 1000;
            }

            .sidebar-content { padding: 0 0.6rem; }

            .logo {
                font-size: 1.6rem;
                font-weight: 800;
                margin: 0 0 0.4rem 0;
                background: linear-gradient(90deg,#ffffff 0%, #DBE2EF 60%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .sidebar-content p {
                margin: 0 0 0.75rem 0;
                color: rgba(255,255,255,0.92);
                font-weight: 600;
                font-size: 0.95rem;
            }

            .sidebar hr {
                border: none;
                border-top: 1px solid rgba(255,255,255,0.12);
                margin: 0.75rem 0;
            }

            /* nav links (no .active used) */
            .sidebar .nav-link {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                color: rgba(255,255,255,0.95);
                padding: 0.55rem 0.9rem;
                border-radius: 12px;
                margin-bottom: 0.35rem;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.18s ease;
            }

            .sidebar .nav-link i {
                width: 22px;
                text-align: center;
                font-size: 1.05rem;
            }

            .sidebar .nav-link:hover {
                transform: translateX(6px);
                background-color: rgba(255,255,255,0.12);
                color: #fff;
            }

            /* logout area */
            .logout-btn {
                padding: 0.9rem 0.6rem;
                border-top: 1px solid rgba(255,255,255,0.08);
            }

            .logout-btn a {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255,255,255,0.95);
                text-decoration: none;
                font-weight: 700;
                transition: transform 0.18s ease, color 0.18s ease;
            }

            .logout-btn a:hover {
                transform: translateX(6px);
                color: #fff;
            }

            .content {
                margin-left: var(--sidebar-width);
                padding: 2rem;
                min-height: 100vh;
                background: linear-gradient(180deg, var(--bg-main) 0%, #fbfdff 60%);
            }

            @media (max-width: 992px) {
                :root { --sidebar-width: 200px; }
                .sidebar { width: var(--sidebar-width); }
                .content { margin-left: var(--sidebar-width); padding: 1.25rem; }
                .logo { font-size: 1.25rem; }
            }

            @media (max-width: 576px) {
                .sidebar { position: relative; width: 100%; min-height: auto; display: block; box-shadow: none; }
                .content { margin-left: 0; padding: 1rem; }
            }

            .nav-link:focus-visible, .logout-btn a:focus-visible {
                outline: 3px solid rgba(63,114,175,0.18);
                outline-offset: 2px;
                border-radius: 10px;
            }

            .me-2 { margin-right: .5rem !important; }
        </style>
    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar" role="navigation" aria-label="Sidebar">
            <div class="sidebar-content">
                <h2 class="logo p-3">itemku</h2>
                @if (Auth::check())
                    <p>Hi, {{ Auth::user()->name }}</p>
                @endif
                <hr>
                <!-- removed hardcoded "active" class from links -->
                <a href="/admin/dashboard" class="nav-link">
                    <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
                </a>
                <a href="/admin/user" class="nav-link">
                    <i class="fa-solid fa-user"></i> <span>User</span>
                </a>
                <a href="/admin/toko" class="nav-link">
                    <i class="fa-solid fa-shop"></i> <span>Toko</span>
                </a>
                <a href="/admin/kategori" class="nav-link">
                    <i class="fa-solid fa-tag"></i> <span>Kategori</span>
                </a>
            </div>
            <div class="logout-btn">
                <hr>
                <a href="/logout" role="button">keluar <i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>

        <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
