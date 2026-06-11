@extends('layouts.admin')

@section('title', 'Tambah Berita Baru')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 900px;">
    
    <!-- Header Form -->
    <div class="mb-4">
        <a href="{{ route('admin.berita.index') }}" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Berita</a>
        <h4 class="fw-bold text-dark m-0 mt-2">Buat Rilis Berita Baru</h4>
    </div>

    <!-- Card Form -->
    <div class="card card-custom p-4 p-md-5 border-0 shadow-sm bg-white">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Input Judul -->
            <div class="mb-4">
                <label for="judul" class="form-label fw-bold text-dark">Judul Berita / Artikel</label>
                <input type="text" name="judul" id="judul" class="form-control px-3 py-2 rounded-3 @error('judul') is-invalid @enderror" placeholder="Contoh: LSP GSP Gelar Sertifikasi Perhotelan Batch 2" value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <!-- Input Gambar -->
                <div class="col-md-8">
                    <label for="gambar" class="form-label fw-bold text-dark">Gambar Utama <span class="text-muted fw-light">(Maksimal 2MB, formats: jpg, png)</span></label>
                    <input type="file" name="gambar" id="gambar" class="form-control rounded-3 @error('gambar') is-invalid @enderror">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Status Publish -->
                <div class="col-md-4">
                    <label for="status" class="form-label fw-bold text-dark">Status Publikasi</label>
                    <select name="status" id="status" class="form-select py-2 rounded-3 @error('status') is-invalid @enderror">
                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Terbitkan (Publish)</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan Draft</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Input Konten / Isi Berita -->
            <div class="mb-5">
                <label for="konten" class="form-label fw-bold text-dark">Isi / Konten Berita</label>
                <textarea name="konten" id="konten" rows="10" class="form-control px-3 py-2 rounded-3 @error('konten') is-invalid @enderror" placeholder="Tuliskan narasi lengkap kegiatan atau berita di sini...">{{ old('konten') }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Aksi Form -->
            <div class="d-flex justify-content-end gap-2 border-top pt-4" style="border-color: var(--border-admin) !important;">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-premium rounded-3">Batal</a>
                <button type="submit" class="btn btn-dark-premium rounded-3"><i class="fa-solid fa-paper-plane me-2"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection