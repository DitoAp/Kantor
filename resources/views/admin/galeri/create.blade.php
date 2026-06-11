@extends('layouts.admin')

@section('title', 'Unggah Foto')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 650px;">
    <div class="mb-4">
        <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
        <h4 class="fw-bold text-dark m-0 mt-2">Unggah Foto Dokumentasi Kegiatan</h4>
    </div>

    <div class="card card-custom p-4 p-md-5 border-0 shadow-sm bg-white">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-bold text-dark">Judul / Nama Kegiatan Foto</label>
                <input type="text" name="judul" class="form-control rounded-3 @error('judul') is-invalid @enderror" placeholder="Contoh: Penyerahan Sertifikat Kompetensi BNSP Mandiri" value="{{ old('judul') }}">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold text-dark">Pilih File Foto <span class="text-muted fw-light">(Maksimal 3MB, formats: jpg, png)</span></label>
                <input type="file" name="gambar" class="form-control rounded-3 @error('gambar') is-invalid @enderror">
                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-5">
                <label class="form-label fw-bold text-dark">Keterangan / Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" class="form-control rounded-3 @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan keterangan tempat atau rincian ringkas aktivitas foto...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex justify-content-end gap-2 border-top pt-4">
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-premium rounded-3">Batal</a>
                <button type="submit" class="btn btn-dark-premium rounded-3"><i class="fa-solid fa-cloud-arrow-up me-2"></i> Mulai Unggah Foto</button>
            </div>
        </form>
    </div>
</div>
@endsection