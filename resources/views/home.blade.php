@extends('layouts.guest')

@section('title', 'LSP Pariwisata Global Spirit Persada - Beranda')

@section('content')

<!-- PREMIUM HERO SECTION DENGAN BACKGROUND GELAP AGAR LOGO KONTRAS -->
<div class="container mb-5">
    <div class="row align-items-center py-5 px-4 rounded-4 border-0 shadow-sm text-white" style="background-color: var(--logo-navy) !important;">
        <div class="col-lg-7 ps-lg-5">
            <!-- Badge dengan kontras warna kuning logo -->
            <span class="badge d-inline-block text-uppercase font-monospace tracking-wide mb-3" style="background-color: rgba(234, 179, 8, 0.15); color: var(--logo-yellow); font-size: 0.75rem; padding: 6px 12px; border-radius: 6px; fw-bold">
                <i class="fa-solid fa-shield-halved me-1"></i> Lisensi Resmi BNSP
            </span>
            <h1 class="display-4 fw-bold serif-title mb-3 text-white" style="font-size: 2.8rem; line-height: 1.2;">
                Membangun Semangat Profesional <br><span style="color: var(--logo-yellow);">Pariwisata Indonesia</span>
            </h1>
            <p class="mb-4 fs-6 fw-light opacity-75" style="line-height: 1.8; max-width: 90%; font-size: 1.05rem !important; color: #cbd5e1;">
                Validasi keahlian Anda di bidang perhotelan, kuliner, dan biro perjalanan melalui sertifikasi resmi kompetensi kerja yang diakui oleh dunia industri nasional maupun internasional.
            </p>
            <div class="d-flex gap-3">
                <!-- Tombol disesuaikan agar kontras di background gelap -->
                <a href="{{ route('skema') }}" class="btn text-decoration-none text-center shadow-sm fw-medium px-4 py-2 rounded-3" style="background-color: var(--logo-maroon); color: #white !important; border: none; transition: all 0.2s ease;">
                    Lihat Skema Kompetensi
                </a>
                <a href="{{ route('profil') }}" class="btn btn-outline-light text-decoration-none text-center px-4 py-2 rounded-3">
                    Tentang Kami
                </a>
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block text-center pe-lg-5">
            <!-- Wadah logo dibuat gelap pekat agar bagian transparan/hitam logo menyatu sempurna -->
            <div class="p-4 rounded-4 d-inline-block shadow-sm" style="background-color: #0f172a; border: 1px solid rgba(255,255,255,0.1); width: 260px; height: 260px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('img/logo.png') }}" alt="Logo LSP GSP Hero" class="img-fluid" style="max-height: 210px; object-fit: contain; border-radius: 8px;">
            </div>
        </div>
    </div>
</div>

<!-- DATA UPDATES SECTION -->
<div class="container pt-4">
    <div class="row g-5">
        
        <!-- BERITA TERBARU (Sisi Kiri) -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-end mb-4 pb-2" style="border-bottom: 2px solid var(--border-soft);">
                <div>
                    <h3 class="fw-bold serif-title m-0" style="font-size: 1.6rem;">Berita & Rilis Kegiatan</h3>
                    <p class="text-muted small m-0 mt-1">Dokumentasi berkala agenda yang telah dilaksanakan oleh lembaga</p>
                </div>
                <a href="{{ route('berita') }}" class="small text-decoration-none fw-semibold p-0" style="color: var(--logo-maroon);">
                    Lihat Semua Rilis &rarr;
                </a>
            </div>
            
            <div class="row g-4">
                @forelse($berita as $item)
                    <div class="col-md-6">
                        <div class="card premium-card h-100 border-0 overflow-hidden d-flex flex-column">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8fafc !important;">
                                    <i class="fa-regular fa-image text-muted opacity-50 fa-2x"></i>
                                </div>
                            @endif
                            <div class="card-body p-4 flex-grow-1">
                                <small class="text-muted d-block mb-2">
                                    <i class="fa-regular fa-calendar me-1"></i> {{ $item->created_at->translatedFormat('d M Y') }}
                                </small>
                                <h5 class="fw-bold text-dark serif-title text-truncate-2 mb-2" style="font-size: 1.1rem; line-height: 1.4; min-height: 2.8rem; color: var(--logo-navy) !important;">
                                    {{ $item->judul }}
                                </h5>
                                <p class="text-muted small mb-0" style="line-height: 1.6;">
                                    {{ Str::limit(strip_tags($item->konten), 95) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 px-4 pb-4 pt-0">
                                <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-sm btn-outline-premium w-100 py-2 font-weight-medium">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="p-5 text-center bg-white rounded-4 border-0 text-muted" style="border: 1px solid var(--border-soft) !important;">
                            <i class="fa-regular fa-folder-open fa-2x mb-2 d-block text-muted opacity-50"></i> 
                            <span class="small">Belum ada update rilis berita terbaru.</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- AGENDA EVENT (Sisi Kanan) -->
        <div class="col-lg-4">
            <div class="d-flex justify-content-between align-items-end mb-4 pb-2" style="border-bottom: 2px solid var(--border-soft);">
                <div>
                    <h3 class="fw-bold serif-title m-0" style="font-size: 1.6rem;">Agenda & Event</h3>
                    <p class="text-muted small m-0 mt-1">Uji kompetensi & workshop terdekat</p>
                </div>
                <a href="{{ route('event') }}" class="small text-decoration-none fw-semibold p-0" style="color: var(--logo-maroon);">
                    Semua Agenda &rarr;
                </a>
            </div>

            <div class="d-grid gap-3">
                @forelse($event as $item)
                    <div class="card border-0 premium-card p-3">
                        <div class="d-flex align-items-start gap-3">
                            <!-- Box Kalender Kuning Soft -->
                            <div class="text-center px-2 py-2 rounded-3 border-0 text-dark fw-bold calendar-box-premium" style="min-width: 65px;">
                                <span class="d-block lh-1 text-uppercase font-monospace" style="font-size: 0.7rem; color: #854d0e; letter-spacing: 0.5px; font-weight: 700;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('M') }}
                                </span>
                                <span class="fs-4 d-block mt-1" style="color: var(--logo-navy); font-weight: 700;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('d') }}
                                </span>
                            </div>
                            <!-- Detail Konten -->
                            <div class="overflow-hidden">
                                <h6 class="fw-bold text-dark text-truncate mb-1" style="font-size: 0.95rem; color: var(--logo-navy) !important;">
                                    {{ $item->nama_event }}
                                </h6>
                                <p class="text-muted small mb-2 text-truncate" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-location-dot me-1 text-muted"></i> {{ $item->lokasi }}
                                </p>
                                <a href="{{ route('event.detail', $item->slug) }}" class="small text-decoration-none fw-medium" style="color: var(--logo-maroon); font-size: 0.85rem; font-weight: 600;">
                                    Detail Event <i class="fa-solid fa-arrow-right ms-1" style="font-size: 10px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center bg-white rounded-4 border-0 text-muted small" style="border: 1px solid var(--border-soft) !important;">
                        <i class="fa-regular fa-calendar-xmark me-1 opacity-50"></i> Tidak ada agenda event dalam waktu dekat.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection