@extends('layouts.guest')

@section('title', 'Event & Agenda - LSP Pariwisata Global Spirit Persada')

@section('content')
<div class="container">
    <!-- Header Area -->
    <div class="text-center mb-5">
        <span class="badge-premium d-inline-block text-uppercase font-monospace tracking-wide mb-2">Kalender Aktivitas</span>
        <h2 class="fw-bold text-dark serif-title display-6" style="font-size: 2.2rem;">Agenda & Event Terdekat</h2>
        <p class="text-muted mx-auto mt-2" style="max-width: 600px; font-weight: 300;">Informasi pelaksanaan bimbingan teknis, workshop hospitality, serta jadwal uji kompetensi pariwisata.</p>
    </div>

    <!-- Grid Event Clean -->
    <div class="row g-4 justify-content-center">
        @forelse($events as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card h-100 border-0 overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_event }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8fafc !important;">
                            <i class="fa-regular fa-calendar-days text-muted opacity-50 fa-2x"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <span class="badge-premium font-monospace" style="font-size: 0.75rem;"><i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h5 class="fw-bold text-dark serif-title text-truncate-2 mb-3" style="line-height: 1.4; color: var(--logo-navy) !important;">{{ $item->nama_event }}</h5>
                        <p class="text-muted small mb-0"><i class="fa-solid fa-location-dot me-1 text-muted" style="color: var(--logo-maroon) !important;"></i> Tempat: {{ Str::limit($item->lokasi, 40) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 px-4 pb-4 pt-0">
                        <a href="{{ route('event.detail', $item->slug) }}" class="btn btn-sm btn-outline-premium w-100 py-2" style="border-color: var(--logo-navy); color: var(--logo-navy);">Detail Informasi</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border-0 text-muted" style="border: 1px solid var(--border-soft) !important;">
                    <i class="fa-regular fa-calendar-xmark fa-2x mb-2 d-block opacity-50"></i> Belum ada jadwal agenda event terdekat yang dirilis.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $events->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection