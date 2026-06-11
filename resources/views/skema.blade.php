@extends('layouts.guest')

@section('title', 'Skema Sertifikasi - LSP Pariwisata GSP')

@section('content')
<div class="container">
    <!-- Header & Search Box Premium -->
    <div class="bg-white p-5 rounded-4 border-0 shadow-sm mb-5" style="border: 1px solid var(--border-soft) !important;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge-premium d-inline-block text-uppercase font-monospace tracking-wide mb-2">Sertifikasi Profesi</span>
                <h2 class="fw-bold text-dark serif-title m-0 display-6" style="font-size: 2.2rem;">Skema Kompetensi Kerja</h2>
                <p class="text-muted mb-0 mt-2">Daftar skema sertifikasi bidang pariwisata dan hospitality yang tersedia untuk uji kompetensi resmi.</p>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <form action="{{ route('skema') }}" method="GET" class="input-group">
                    <input type="text" name="search" class="form-control px-4 py-2 border-end-0 rounded-start-3" placeholder="Cari skema atau kode..." value="{{ request('search') }}" style="border-color: var(--border-soft);">
                    <button class="btn btn-dark px-4" type="submit" style="background-color: var(--logo-navy); border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Grid Skema Clean -->
    <div class="row g-4">
        @forelse($skemas as $skema)
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge-premium text-uppercase font-monospace" style="font-size: 0.7rem; padding: 4px 8px;">{{ $skema->jenis }}</span>
                                <small class="text-muted font-monospace" style="font-size: 0.8rem;"><i class="fa-solid fa-barcode me-1"></i> {{ $skema->kode_skema }}</small>
                            </div>
                            <h5 class="fw-bold serif-title mb-3" style="font-size: 1.15rem; line-height: 1.4; color: var(--logo-navy) !important;">{{ $skema->nama_skema }}</h5>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-3" style="border-color: var(--border-soft) !important;">
                            <span class="small text-muted"><i class="fa-solid fa-list-check me-1" style="color: var(--logo-maroon);"></i> {{ $skema->jumlah_unit }} Unit Kompetensi</span>
                            <span class="badge bg-success-subtle text-success px-2 py-1 rounded small fw-medium" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-check me-1"></i> Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border-0 text-muted" style="border: 1px solid var(--border-soft) !important;">
                    <i class="fa-solid fa-triangle-exclamation fa-2x mb-2 d-block opacity-50"></i> Skema sertifikasi tidak ditemukan atau belum ditambahkan.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination Link -->
    <div class="d-flex justify-content-center mt-5">
        {{ $skemas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection