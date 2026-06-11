@extends('layouts.admin')

@section('title', 'Galeri Dokumentasi')

@section('admin_content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Galeri Album Dokumentasi</h4>
            <p class="text-muted small m-0 mt-1">Unggah dokumentasi foto pelaksanaan uji kompetensi pariwisata resmi.</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-dark-premium rounded-3 small">
            <i class="fa-solid fa-cloud-arrow-up me-2"></i> Unggah Foto Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check text-success"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <div class="row g-4">
        @forelse($galeris as $foto)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card card-custom border-0 overflow-hidden shadow-sm h-100 bg-white">
                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="w-100" style="height: 180px; object-fit: cover;">
                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="fw-bold text-dark text-truncate mb-1">{{ $foto->judul }}</h6>
                            <p class="text-muted small text-truncate-2 mb-0" style="font-size: 0.8rem; line-height: 1.4;">{{ $foto->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="border-top pt-3 mt-3 text-end">
                            <form action="{{ route('admin.galeri.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini secara permanen?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-2"><i class="fa-solid fa-trash-can me-1"></i> Hapus Berkas Foto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border-0 text-muted shadow-sm"><i class="fa-regular fa-images fa-2x mb-2 d-block opacity-50"></i> Belum ada koleksi foto dokumentasi.</div>
            </div>
        @endforelse
    </div>

    @if($galeris->hasPages())
        <div class="d-flex justify-content-center mt-5">{{ $galeris->links('pagination::bootstrap-5') }}</div>
    @endif
</div>
@endsection