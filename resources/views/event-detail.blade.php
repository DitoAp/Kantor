@extends('layouts.guest')

@section('title', $event->nama_event . ' - LSP Pariwisata GSP')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <a href="{{ route('event') }}" class="btn btn-sm btn-link text-decoration-none text-dark fw-medium p-0 mb-4">&larr; Kembali ke Jadwal Event</a>
            
            <div class="row g-4 bg-white p-4 p-md-5 rounded-4 border border-light-subtle shadow-sm">
                <!-- Info Summary Panel (Kiri) -->
                <div class="col-md-4 order-md-2">
                    <div class="p-4 bg-light rounded-3 border sticky-top" style="top: 100px;">
                        <h6 class="fw-bold text-dark text-uppercase tracking-wider mb-3" style="font-size: 0.8rem;">Detail Pelaksanaan</h6>
                        
                        <div class="mb-3">
                            <small class="text-muted d-block">Tanggal Pelaksanaan</small>
                            <span class="fw-semibold text-dark"><i class="fa-regular fa-calendar me-1 text-primary"></i> {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->translatedFormat('d F Y') }}</span>
                        </div>
                        
                        <div class="mb-0">
                            <small class="text-muted d-block">Tempat / TUK</small>
                            <span class="fw-semibold text-dark"><i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $event->lokasi }}</span>
                        </div>
                    </div>
                </div>

                <!-- Konten Utama (Kanan) -->
                <div class="col-md-8 order-md-1">
                    <h2 class="fw-bold text-dark serif-title mb-4" style="line-height: 1.3;">{{ $event->nama_event }}</h2>
                    
                    @if($event->gambar)
                        <div class="mb-4 overflow-hidden rounded-3">
                            <img src="{{ asset('storage/' . $event->gambar) }}" class="img-fluid w-100" alt="{{ $event->nama_event }}" style="max-height: 350px; object-fit: cover;">
                        </div>
                    @endif

                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">Deskripsi / Syarat Agenda</h5>
                    <div class="text-muted fs-6 fw-light" style="line-height: 1.8; text-align: justify;">
                        {!! nl2br(e($event->deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection