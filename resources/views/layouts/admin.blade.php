<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') - LSP GSP</title>
    
    <!-- Google Fonts & Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.png') }}">
    
    <style>
        :root {
            --admin-navy: #0f172a;
            --admin-maroon: #991b1b;
            --bg-admin: #f8fafc;
            --border-admin: #e2e8f0;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-admin);
            color: #1e293b;
            font-size: 0.9rem;
        }
        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--admin-navy);
            color: #94a3b8;
            padding: 20px;
            z-index: 100;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            border-left: 4px solid var(--admin-maroon);
            border-radius: 0 8px 8px 0;
            background-color: rgba(255, 255, 255, 0.08);
        }
        /* Main Content Panel */
        .main-wrapper {
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;
        }
        .card-custom {
            background: #ffffff;
            border: 1px solid var(--border-admin);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
    </style>
</head>
<body>

    <!-- SIDEBAR PANEL -->
    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <!-- Header Brand -->
            <div class="d-flex align-items-center mb-4 px-2">
                <img src="{{ asset('img/logo.png') }}" class="rounded me-2" style="height: 35px; width: 35px; object-fit: cover;">
                <div>
                    <span class="text-white fw-bold d-block lh-1" style="font-size: 0.95rem; letter-spacing: 0.5px;">PANEL KONTROL</span>
                    <small style="font-size: 10px; color: var(--admin-maroon); font-weight: bold; tracking-wide">ADMINISTRATOR</small>
                </div>
            </div>
            <hr class="border-secondary opacity-25 mb-4">
            
            <!-- Menu Navigasi -->
            <nav class="nav flex-column">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-pie"></i> Ikhtisar Ringkas
                </a>
                <a class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">
                    <i class="fa-solid fa-newspaper"></i> Kelola Berita
                </a>
                <a class="nav-link {{ Request::is('admin/event*') ? 'active' : '' }}" href="{{ route('admin.event.index') }}">
                    <i class="fa-solid fa-calendar-check"></i> Kelola Event
                </a>
                <a class="nav-link {{ Request::is('admin/skema*') ? 'active' : '' }}" href="{{ route('admin.skema.index') }}">
                    <i class="fa-solid fa-layer-group"></i> Skema Sertifikasi
                </a>
                <a class="nav-link {{ Request::is('admin/galeri*') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}">
                    <i class="fa-solid fa-images"></i> Galeri Foto
                </a>
            </nav>
        </div>

        <!-- Tombol Keluar Menuju Halaman Publik -->
        <div>
            <hr class="border-secondary opacity-25 mb-3">
            <a href="{{ url('/') }}" class="nav-link text-white-50 small"><i class="fa-solid fa-arrow-left-from-line"></i> Lihat Situs Utama</a>
        </div>
    </div>

    <!-- MAIN APP CONTENT -->
    <div class="main-wrapper">
        @yield('admin_content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>