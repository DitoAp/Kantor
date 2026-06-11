@extends('layouts.guest')

@section('title', 'Berita & Artikel - LSP Pariwisata Global Spirit Persada')

@section('content')
<div class="container">
    <!-- Header & Search Box Premium -->
    <div class="bg-white p-5 rounded-4 border-0 shadow-sm mb-5" style="border: 1px solid var(--border-soft) !important;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge-premium d-inline-block text-uppercase font-monospace tracking-wide mb-2">Rilis Media</span>
                <h2 class="fw-bold text-dark serif-title m-0 display-6" style="font-size: 2.2rem;">Berita & Kegiatan Lembaga</h2>
                <p class="text-muted mb-0 mt-2">Ikuti perkembangan agenda sertifikasi dan pembaruan industri pariwisata yang telah kami laksanakan.</p>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <form action="{{ route('berita') }}" method="GET" class="input-group">
                    <input type="text" name="search" class="form-control px-4 py-2 border-end-0 rounded-start-3" placeholder="Cari judul berita..." value="{{ request('search') }}" style="border-color: var(--border-soft);">
                    <button class="btn btn-dark px-4" type="submit" style="background-color: var(--logo-navy); border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Grid Berita Clean -->
    <div class="row g-4">
        @forelse($beritas as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card h-100 border-0 overflow-hidden d-flex flex-column">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 220px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px; background-color: #f8fafc !important;">
                            <i class="fa-regular fa-image text-muted opacity-50 fa-2x"></i>
                        </div>
                    @endif
                    <div class="card-body p-4 flex-grow-1">
                        <small class="text-muted d-block mb-2"><i class="fa-regular fa-calendar me-1"></i> {{ $item->created_at->translatedFormat('d M Y') }}</small>
                        <h5 class="fw-bold text-dark serif-title text-truncate-2 mb-3" style="line-height: 1.4; min-height: 2.8rem; color: var(--logo-navy) !important;">
                            {{ $item->judul }}
                        </h5>
                        <p class="text-muted small mb-0" style="line-height: 1.6;">{{ Str::limit(strip_tags($item->konten), 110) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 px-4 pb-4 pt-0">
                        <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-sm btn-outline-premium w-100 py-2">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border-0 text-muted" style="border: 1px solid var(--border-soft) !important;">
                    <i class="fa-regular fa-folder-open fa-2x mb-2 d-block opacity-50"></i> Belum ada artikel atau berita yang dipublikasikan.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $beritas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection