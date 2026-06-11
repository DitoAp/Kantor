<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LSP Pariwisata Global Spirit Persada')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.png') }}">
    
    <style>
        :root {
            /* SINKRONISASI WARNA BERDASARKAN LOGO KORPORAT */
            --bg-global: #f8fafc;        
            --logo-navy: #1e293b;        /* Diambil dari elemen biru tua logo */
            --logo-maroon: #991b1b;      /* Diambil dari elemen merah marun logo */
            --logo-yellow: #eab308;      /* Diambil dari elemen kuning terang logo */
            
            --text-main: #1e293b;        
            --text-muted: #64748b;       
            --border-soft: #e2e8f0;      
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-global);
            color: var(--text-main);
            font-size: 0.95rem;
            letter-spacing: -0.1px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .serif-title {
            font-family: 'Playfair Display', serif;
            color: var(--logo-navy);
            font-weight: 700;
        }

        /* NAVBAR BRANDING DENGAN LOGO RESMI */
        .custom-navbar {
            background-color: #ffffff !important;
            border-bottom: 2px solid var(--logo-maroon); /* Aksen garis marun logo */
            padding: 12px 0;
        }

        .navbar-brand .brand-title {
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: var(--logo-navy);
        }

        .navbar-brand .brand-subtitle {
            font-size: 0.65rem;
            letter-spacing: 2px;
            color: var(--logo-maroon);
            text-transform: uppercase;
            font-weight: 600;
        }

        .nav-link {
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text-muted) !important;
            padding: 6px 12px !important;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--logo-maroon) !important; /* Berubah marun saat aktif */
        }

        /* PREMIUM COMPONENT CARDS */
        .premium-card {
            background: #ffffff;
            border: 1px solid var(--border-soft) !important;
            border-radius: 14px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .premium-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 35px rgba(30, 41, 59, 0.05) !important;
            border-color: rgba(153, 27, 27, 0.2) !important; /* Border hover marun halus */
        }

        /* PREMIUM BUTTONS */
        .btn-dark-premium {
            background-color: var(--logo-navy);
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-dark-premium:hover {
            background-color: var(--logo-maroon);
            color: #ffffff;
        }

        .btn-outline-premium {
            background-color: transparent;
            color: var(--text-main);
            border: 1px solid #cbd5e1;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-outline-premium:hover {
            background-color: #f1f5f9;
            border-color: var(--logo-navy);
        }
        
        .badge-premium {
            background-color: #fee2e2; /* Basis merah muda soft */
            color: var(--logo-maroon);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
        }

        /* KALENDER AGENDA HOME */
        .calendar-box-premium {
            background-color: #fef9c3 !important; /* Basis kuning soft dari logo */
            color: #854d0e;
        }

        /* FOOTER BRANDING */
        footer {
            background-color: var(--logo-navy);
            color: #94a3b8;
            font-size: 0.88rem;
            border-top: 4px solid var(--logo-maroon);
        }

        footer h6 {
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1.5px;
        }

        footer a {
            color: #94a3b8;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--logo-yellow);
        }
    </style>
</head>
<body>

    <!-- NAVBAR DENGAN LOGO ASLI -->
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <!-- MENAMPILKAN LOGO ASLI DI SEBELAH NAMA WEB -->
                <img src="{{ asset('img/logo.png') }}" alt="Logo LSP GSP" class="me-3 rounded" style="height: 45px; width: 45px; object-fit: cover;">
                <div>
                    <span class="brand-title d-block lh-1">LSP PARIWISATA</span>
                    <span class="brand-subtitle">Global Spirit Persada</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('profil') ? 'active fw-bold' : '' }}" href="{{ route('profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('skema*') ? 'active fw-bold' : '' }}" href="{{ route('skema') }}">Skema</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('berita*') ? 'active fw-bold' : '' }}" href="{{ route('berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('event*') ? 'active fw-bold' : '' }}" href="{{ route('event') }}">Event</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('galeri*') ? 'active fw-bold' : '' }}" href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active fw-bold' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
                <div class="ms-lg-4 mt-3 mt-lg-0">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-dark-premium btn-sm px-4 rounded-3 shadow-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-premium btn-sm px-4 rounded-3">Portal Admin</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT AREA -->
    <main class="py-5 flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER LUXURY MATCHING -->
    <footer class="pt-5 pb-4">
        <div class="container">
            <div class="row g-4 text-start">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo LSP GSP Footer" class="me-3 rounded" style="height: 40px; width: 40px; object-fit: cover; filter: brightness(0.9);">
                        <h6 class="text-uppercase tracking-wider m-0">LSP Pariwisata GSP</h6>
                    </div>
                    <p class="small text-muted pe-lg-5" style="line-height: 1.8; color: #94a3b8 !important;">
                        Lembaga Sertifikasi Profesi yang berkomitmen penuh pada standardisasi dan penjaminan mutu kompetensi tenaga kerja di sektor hospitality, tour guiding, dan industri pariwisata global.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-uppercase tracking-wider mb-3">Sektor Sertifikasi</h6>
                    <ul class="list-unstyled small d-grid gap-2" style="color: #64748b;">
                        <li><i class="fa-solid fa-angle-right me-2" style="color: var(--logo-yellow);"></i> Perhotelan & Restoran</li>
                        <li><i class="fa-solid fa-angle-right me-2" style="color: var(--logo-yellow);"></i> Biro Perjalanan Wisata</li>
                        <li><i class="fa-solid fa-angle-right me-2" style="color: var(--logo-yellow);"></i> Kepanduan & Destinasi</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h6 class="text-uppercase tracking-wider mb-3">Hubungi Sekretariat</h6>
                    <p class="small mb-2" style="color: #94a3b8;"><i class="fas fa-map-marker-alt me-2" style="color: var(--logo-yellow);"></i> Jawa Timur, Indonesia</p>
                    <p class="small mb-2" style="color: #94a3b8;"><i class="fas fa-envelope me-2" style="color: var(--logo-yellow);"></i> sekretariat@lsp-gsp.or.id</p>
                </div>
            </div>
            <hr class="border-secondary my-4" style="opacity: 0.15;">
            <div class="text-center small text-muted" style="color: #64748b !important;">
                &copy; {{ date('Y') }} <span class="text-white fw-medium">LSP Pariwisata Global Spirit Persada</span>. Terlisensi Resmi BNSP.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>