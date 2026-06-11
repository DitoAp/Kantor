@extends('layouts.guest')

@section('title', 'Profil - LSP Pariwisata Global Spirit Persada')

@section('content')
<div class="container">
    <!-- Header Page -->
    <div class="bg-white p-5 rounded-4 border-0 shadow-sm mb-5 text-center" style="border: 1px solid var(--border-soft) !important;">
        <span class="badge-premium d-inline-block text-uppercase font-monospace tracking-wide mb-2">Tentang Lembaga</span>
        <h2 class="fw-bold serif-title m-0 display-5" style="font-size: 2.2rem;">Profil Komprehensif</h2>
        <p class="text-muted mb-0 mt-2">Mengenal Lebih Dekat LSP Pariwisata Global Spirit Persada</p>
    </div>

    <div class="row g-4">
        <!-- Tentang Kami -->
        <div class="col-md-12 mb-2">
            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white" style="border: 1px solid var(--border-soft) !important;">
                <h4 class="fw-bold serif-title mb-3" style="font-size: 1.4rem; color: var(--logo-maroon) !important;"><i class="fa-solid fa-building-columns me-2"></i> Eksistensi & Legalitas Lembaga</h4>
                <p class="text-muted lh-lg fs-6" style="text-align: justify; font-weight: 300;">
                    <strong>LSP Pariwisata Global Spirit Persada</strong> adalah lembaga independen berbadan hukum resmi yang diberikan wewenang penuh oleh Badan Nasional Sertifikasi Profesi (BNSP) untuk melaksanakan uji kompetensi dan menerbitkan sertifikat kompetensi di sektor pariwisata. Kami didirikan atas dedikasi dan semangat tinggi untuk terus meningkatkan mutu, standarisasi, daya saing, serta profesionalisme tenaga kerja pariwisata Indonesia agar mampu memimpin di kancah nasional maupun industri pariwisata global.
                </p>
            </div>
        </div>

        <!-- Visi -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 p-4 p-md-5 rounded-4 bg-white" style="border: 1px solid var(--border-soft) !important; border-top: 3px solid var(--logo-maroon) !important;">
                <h4 class="fw-bold serif-title mb-3" style="font-size: 1.3rem;"><i class="fa-solid fa-eye me-2" style="color: var(--logo-yellow);"></i> Visi Utama</h4>
                <p class="text-muted fst-italic lh-lg font-weight-light" style="font-size: 1.05rem;">
                    "Menjadi Lembaga Sertifikasi Profesi Pariwisata yang unggul, kredibel, terpercaya, dan berstandar internasional dalam mewujudkan ekosistem tenaga kerja pariwisata yang kompeten, berdaya saing global, dan berintegritas tinggi."
                </p>
            </div>
        </div>

        <!-- Misi -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 p-4 p-md-5 rounded-4 bg-white" style="border: 1px solid var(--border-soft) !important; border-top: 3px solid var(--logo-maroon) !important;">
                <h4 class="fw-bold serif-title mb-3" style="font-size: 1.3rem;"><i class="fa-solid fa-bullseye me-2" style="color: var(--logo-maroon);"></i> Misi Strategis</h4>
                <ul class="text-muted ps-3 d-grid gap-2 lh-relaxed font-weight-light" style="font-size: 0.95rem;">
                    <li>Menyelenggarakan uji kompetensi sektor pariwisata secara objektif, adil, akuntabel, transparan, dan sistematis.</li>
                    <li>Mengembangkan skema-skema sertifikasi mutakhir yang adaptif dengan akselerasi kebutuhan industri pariwisata terkini.</li>
                    <li>Memelihara konsistensi kompetensi tenaga kerja melalui sistem surveilan yang terukur dan profesional.</li>
                    <li>Membangun kemitraan strategis dengan jaringan industri perhotelan, kuliner, dan destinasi baik domestik maupun mancanegara.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection