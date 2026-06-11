@extends('layouts.guest')

@section('title', $berita->judul . ' - LSP Pariwisata GSP')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Tombol Kembali -->
            <a href="{{ route('berita') }}" class="btn btn-sm btn-link text-decoration-none text-dark fw-medium p-0 mb-4">&larr; Kembali ke Berita</a>
            
            <!-- Judul Utama -->
            <h1 class="display-5 fw-bold text-dark serif-title mb-3" style="line-height: 1.3;">{{ $berita->judul }}</h1>
            
            <div class="d-flex align-items-center gap-3 text-muted border-bottom pb-4 mb-4 small">
                <span><i class="fa-regular fa-calendar-days me-1"></i> Dipublikasikan: {{ $berita->created_at->translatedFormat('d F Y') }}</span>
                <span><i class="fa-regular fa-user me-1"></i> Admin Sekretariat</span>
            </div>

            <!-- Gambar Utama -->
            @if($berita->gambar)
                <div class="mb-5 overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid w-100" alt="{{ $berita->judul }}" style="max-height: 480px; object-fit: cover;">
                </div>
            @endif

            <!-- Isi Konten Artikel -->
            <div class="article-content text-dark fs-5 fw-light" style="line-height: 1.8; text-align: justify; font-family: 'Inter', sans-serif;">
                {!! nl2br(e($berita->konten)) !!}
            </div>
        </div>
    </div>
</div>
@endsection