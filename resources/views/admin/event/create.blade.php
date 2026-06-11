@extends('layouts.admin')

@section('title', 'Jadwal Event Baru')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 900px;">
    
    <div class="mb-4">
        <a href="{{ route('admin.event.index') }}" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Kalender Event</a>
        <h4 class="fw-bold text-dark m-0 mt-2">Jadwalkan Agenda Baru</h4>
    </div>

    <div class="card card-custom p-4 p-md-5 border-0 shadow-sm bg-white">
        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_event" class="form-label fw-bold text-dark">Nama Kegiatan / Agenda Event</label>
                <input type="text" name="nama_event" id="nama_event" class="form-control px-3 py-2 rounded-3 @error('nama_event') is-invalid @enderror" placeholder="Contoh: Uji Kompetensi Mandiri Sektor Perhotelan Skema F&B Service" value="{{ old('nama_event') }}">
                @error('nama_event')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="tanggal_pelaksanaan" class="form-label fw-bold text-dark">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" class="form-control px-3 py-2 rounded-3 @error('tanggal_pelaksanaan') is-invalid @enderror" value="{{ old('tanggal_pelaksanaan') }}">
                    @error('tanggal_pelaksanaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="lokasi" class="form-label fw-bold text-dark">Tempat Pelaksanaan / Lokasi TUK</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control px-3 py-2 rounded-3 @error('lokasi') is-invalid @enderror" placeholder="Contoh: Gedung TUK Utama LSP GSP, Lt. 2" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label fw-bold text-dark">Brosur Kegiatan / Banner Pamflet <span class="text-muted fw-light">(Maksimal 2MB, formats: jpg, png)</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control rounded-3 @error('gambar') is-invalid @enderror">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="deskripsi" class="form-label fw-bold text-dark">Detail Deskripsi & Persyaratan Agenda</label>
                <textarea name="deskripsi" id="deskripsi" rows="8" class="form-control px-3 py-2 rounded-3 @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan persyaratan peserta, berkas administrasi, dan rincian alur pelaksanaan kegiatan di sini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2 border-top pt-4" style="border-color: var(--border-admin) !important;">
                <a href="{{ route('admin.event.index') }}" class="btn btn-outline-premium rounded-3">Batal</a>
                <button type="submit" class="btn btn-dark-premium rounded-3"><i class="fa-solid fa-calendar-plus me-2"></i> Publikasikan Agenda</button>
            </div>
        </form>
    </div>
</div>
@endsection