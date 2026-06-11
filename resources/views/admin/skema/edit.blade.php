@extends('layouts.admin')

@section('title', 'Edit Skema')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 800px;">
    <div class="mb-4">
        <a href="{{ route('admin.skema.index') }}" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
        <h4 class="fw-bold text-dark m-0 mt-2">Ubah Data Skema Sertifikasi</h4>
    </div>

    <div class="card card-custom p-4 p-md-5 border-0 shadow-sm bg-white">
        <form action="{{ route('admin.skema.update', $skema->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Kode Skema</label>
                    <input type="text" name="kode_skema" class="form-control rounded-3 @error('kode_skema') is-invalid @enderror" value="{{ old('kode_skema', $skema->kode_skema) }}">
                    @error('kode_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Jenis / Klasifikasi Skema</label>
                    <input type="text" name="jenis" class="form-control rounded-3 @error('jenis') is-invalid @enderror" value="{{ old('jenis', $skema->jenis) }}">
                    @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold text-dark">Nama Judul Skema Sertifikasi</label>
                    <input type="text" name="nama_skema" class="form-control rounded-3 @error('nama_skema') is-invalid @enderror" value="{{ old('nama_skema', $skema->nama_skema) }}">
                    @error('nama_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Jumlah Unit Kompetensi</label>
                    <input type="number" name="jumlah_unit" class="form-control rounded-3 @error('jumlah_unit') is-invalid @enderror" value="{{ old('jumlah_unit', $skema->jumlah_unit) }}">
                    @error('jumlah_unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Status Keaktifan</label>
                    <select name="status_aktif" class="form-select rounded-3">
                        <option value="1" {{ $skema->status_aktif == 1 ? 'selected' : '' }}>Aktif & Tampilkan</option>
                        <option value="0" {{ $skema->status_aktif == 0 ? 'selected' : '' }}>Non-Aktif (Sembunyikan)</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 border-top pt-4 mt-5">
                <a href="{{ route('admin.skema.index') }}" class="btn btn-outline-premium rounded-3">Batal</a>
                <button type="submit" class="btn btn-dark-premium rounded-3"><i class="fa-solid fa-arrows-rotate me-2"></i> Perbarui Skema</button>
            </div>
        </form>
    </div>
</div>
@endsection