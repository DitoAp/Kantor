@extends('layouts.admin')

@section('title', 'Ikhtisar Ringkas')

@section('admin_content')
<div class="container-fluid p-0">
    <!-- Header Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Selamat Datang, Admin Sekretariat</h4>
            <p class="text-muted small m-0 mt-1">Gunakan panel ini untuk memperbarui informasi rilis berita dan agenda event yang telah terlaksana.</p>
        </div>
        <div class="text-muted small font-monospace"><i class="fa-solid fa-clock me-1"></i> {{ date('d F Y') }}</div>
    </div>

    <!-- Statistik Ringkas Info Card -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card card-custom p-4 d-flex flex-row align-items-center gap-3">
                <div class="p-3 bg-primary-subtle text-primary rounded-3"><i class="fa-solid fa-newspaper fa-xl"></i></div>
                <div>
                    <small class="text-muted d-block text-uppercase font-monospace" style="font-size: 11px;">Total Berita</small>
                    <span class="fs-4 fw-bold text-dark">{{ \App\Models\Berita::count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-custom p-4 d-flex flex-row align-items-center gap-3">
                <div class="p-3 bg-success-subtle text-success rounded-3"><i class="fa-solid fa-calendar-check fa-xl"></i></div>
                <div>
                    <small class="text-muted d-block text-uppercase font-monospace" style="font-size: 11px;">Total Event</small>
                    <span class="fs-4 fw-bold text-dark">{{ \App\Models\Event::count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-custom p-4 d-flex flex-row align-items-center gap-3">
                <div class="p-3 bg-warning-subtle text-warning rounded-3"><i class="fa-solid fa-layer-group fa-xl"></i></div>
                <div>
                    <small class="text-muted d-block text-uppercase font-monospace" style="font-size: 11px;">Skema Aktif</small>
                    <span class="fs-4 fw-bold text-dark">{{ \App\Models\Skema::count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-custom p-4 d-flex flex-row align-items-center gap-3">
                <div class="p-3 bg-danger-subtle text-danger rounded-3"><i class="fa-solid fa-images fa-xl"></i></div>
                <div>
                    <small class="text-muted d-block text-uppercase font-monospace" style="font-size: 11px;">Foto Galeri</small>
                    <span class="fs-4 fw-bold text-dark">{{ \App\Models\Galeri::count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection