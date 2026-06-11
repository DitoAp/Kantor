@extends('layouts.guest')

@section('title', 'Hubungi Sekretariat - LSP Pariwisata GSP')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white rounded-4 border-0 shadow-sm overflow-hidden" style="border: 1px solid var(--border-soft) !important;">
                <div class="row g-0">
                    <!-- Info Panel (Kiri) -->
                    <div class="col-md-5 text-white p-5 d-flex flex-column justify-content-between" style="background-color: var(--logo-navy) !important;">
                        <div>
                            <h3 class="fw-bold serif-title text-white mb-3" style="font-size: 1.6rem;">Hubungi Kami</h3>
                            <p class="small mb-4 opacity-75" style="line-height: 1.7; color: #cbd5e1;">Sekretariat LSP Pariwisata Global Spirit Persada siap melayani pertanyaan terkait registrasi, verifikasi berkas, dan jadwal uji sertifikasi.</p>
                            
                            <div class="d-grid gap-4 small mt-4" style="color: #cbd5e1;">
                                <div class="d-flex align-items-start gap-3">
                                    <i class="fa-solid fa-location-dot mt-1 fs-5" style="color: var(--logo-yellow);"></i>
                                    <span style="line-height: 1.5;">Kompleks Perkantoran Pariwisata, Blok G-12, Jawa Timur, Indonesia</span>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa-solid fa-envelope fs-5" style="color: var(--logo-yellow);"></i>
                                    <span>sekretariat@lsp-gsp.or.id</span>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa-solid fa-phone fs-5" style="color: var(--logo-yellow);"></i>
                                    <span>+62 812-3456-7890</span>
                                </div>
                            </div>
                        </div>

                        <div class="border-top border-secondary pt-4 mt-5 opacity-50">
                            <small class="d-block" style="font-size: 0.75rem;">Operasional: Senin - Jumat (08.00 - 16.00 WIB)</small>
                        </div>
                    </div>

                    <!-- Map / Graphic Panel (Kanan) -->
                    <div class="col-md-7 p-5 bg-white d-flex align-items-center justify-content-center">
                        <div class="text-center w-100 py-5">
                            <i class="fa-solid fa-map-location-dot text-muted opacity-25 mb-3" style="font-size: 4.5rem; color: var(--text-muted) !important;"></i>
                            <h5 class="fw-bold text-dark serif-title mb-2" style="font-size: 1.25rem;">Kantor Sekretariat Pusat</h5>
                            <p class="text-muted small mx-auto font-weight-light" style="max-width: 80%; line-height: 1.6;">Gunakan koordinat peta resmi digital atau silakan berkonsultasi langsung melalui kontak sekretariat jika memerlukan panduan arah menuju Gedung TUK Utama.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection