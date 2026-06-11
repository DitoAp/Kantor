@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 900px;">
    
    <!-- Header Form -->
    <div class="mb-4">
        <a href="{{ route('admin.berita.index') }}" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Berita</a>
        <h4 class="fw-bold text-dark m-0 mt-2">Ubah / Perbarui Data Berita</h4>
    </div>

    <!-- Card Form -->
    <div class="card card-custom p-4 p-md-5 border-0 shadow-sm bg-white">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Judul -->
            <div class="mb-4">
                <label for="judul" class="form-label fw-bold text-dark">Judul Berita / Artikel</label>
                <input type="text" name="judul" id="judul" class="form-control px-3 py-2 rounded-3 @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4 align-items-end">
                <!-- Preview Gambar Lama & Input Gambar Baru -->
                <div class="col-md-8">
                    <label for="gambar" class="form-label fw-bold text-dark">Ganti Gambar <span class="text-muted fw-light">(Biarkan kosong jika tidak ingin diubah)</span></label>
                    @if($berita->gambar)
                        <div class="mb-2 small text-muted d-flex align-items-center gap-2">
                            <i class="fa-solid fa-paperclip"></i> File tersimpan: 
                            <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank" class="text-decoration-none fw-medium text-primary">Lihat Gambar Saat Ini</a>
                        </div>
                    @endif
                    <input type="file" name="gambar" id="gambar" class="form-control rounded-3 @error('gambar') is-invalid @enderror">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Status Publish -->
                <div class="col-md-4">
                    <label for="status" class="form-label fw-bold text-dark">Status Publikasi</label>
                    <select name="status" id="status" class="form-select py-2 rounded-3 @error('status') is-invalid @enderror">
                        <option value="publish" {{ old('status', $berita->status) == 'publish' ? 'selected' : '' }}>Terbitkan (Publish)</option>
                        <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Simpan Draft</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Input Konten / Isi Berita -->
            <div class="mb-5">
                <label for="konten" class="form-label fw-bold text-dark">Isi / Konten Berita</label>
                <textarea name="konten" id="konten" rows="10" class="form-control px-3 py-2 rounded-3 @error('konten') is-invalid @enderror">{{ old('konten', $berita->konten) }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Aksi Form -->
            <div class="d-flex justify-content-end gap-2 border-top pt-4" style="border-color: var(--border-admin) !important;">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-premium rounded-3">Batal</a>
                <button type="submit" class="btn btn-dark-premium rounded-3"><i class="fa-solid fa-arrows-rotate me-2"></i> Perbarui Data</button>
            </div>
        </form>
    </div>
</div>
@endsection