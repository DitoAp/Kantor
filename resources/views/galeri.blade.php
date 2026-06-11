@extends('layouts.guest')

@section('title', 'Galeri Foto Kegiatan - LSP Pariwisata GSP')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <span class="badge text-uppercase font-monospace tracking-wide mb-2" style="background-color: #fef3c7; color: #b45309;">Dokumentasi Visual</span>
        <h2 class="fw-bold text-dark serif-title display-6">Galeri Kegiatan LSP</h2>
        <p class="text-muted mx-auto" style="max-width: 500px;">Kilasan visual proses pelaksanaan uji kompetensi mandiri, penandatanganan MoU industri, dan penyerahan sertifikat BNSP.</p>
    </div>

    <!-- Grid Foto Clean & Profesional -->
    <div class="row g-4">
        @if(isset($galeris) && $galeris->count() > 0)
            @foreach($galeris as $foto)
                <div class="col-lg-4 col-md-6">
                    <div class="card premium-card border-0 shadow-sm overflow-hidden h-100 bg-white">
                        <div class="position-relative overflow-hidden">
                            @if($foto->gambar)
                                <img src="{{ asset('storage/' . $foto->gambar) }}" class="img-fluid w-100" alt="{{ $foto->judul }}" style="height: 250px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="fa-regular fa-image text-muted fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 1.1rem;">{{ $foto->judul ?? 'Foto Kegiatan' }}</h5>
                            @if($foto->deskripsi)
                                <p class="text-muted small mb-0 text-truncate-2">{{ $foto->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Tampilan Default Jika Database Masih Kosong (Biar Tidak Error) -->
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border text-muted">
                    <i class="fa-regular fa-images fa-3x mb-3 d-block text-secondary"></i> 
                    <h5>Album Dokumentasi Belum Tersedia</h5>
                    <p class="small text-muted">Foto kegiatan akan segera diperbarui setelah data diunggah melalui Dashboard Admin.</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if(isset($galeris) && $galeris->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection