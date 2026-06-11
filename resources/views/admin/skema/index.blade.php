@extends('layouts.admin')

@section('title', 'Skema Sertifikasi')

@section('admin_content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Daftar Skema Sertifikasi</h4>
            <p class="text-muted small m-0 mt-1">Kelola data standar kompetensi kerja pariwisata yang aktif di lembaga.</p>
        </div>
        <a href="{{ route('admin.skema.create') }}" class="btn btn-dark-premium rounded-3 small">
            <i class="fa-solid fa-plus me-2"></i> Tambah Skema Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check text-success"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <div class="card card-custom border-0 overflow-hidden shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead class="table-light text-uppercase font-monospace text-muted" style="font-size: 11px; border-bottom: 1px solid var(--border-admin);">
                    <tr>
                        <th class="ps-4 py-3" style="width: 60px;">No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema Sertifikasi</th>
                        <th>Jenis Klaster</th>
                        <th>Jumlah Unit</th>
                        <th>Status</th>
                        <th class="text-end pe-4" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($skemas as $index => $item)
                        <tr>
                            <td class="ps-4 text-muted">{{ $skemas->firstItem() + $index }}</td>
                            <td class="fw-mono fw-bold text-dark">{{ $item->kode_skema }}</td>
                            <td class="fw-semibold">{{ $item->nama_skema }}</td>
                            <td><span class="badge-premium font-monospace" style="font-size: 11px;">{{ $item->jenis }}</span></td>
                            <td class="text-muted"><i class="fa-solid fa-list-check me-1 small"></i> {{ $item->jumlah_unit }} Unit</td>
                            <td>
                                @if($item->status_aktif)
                                    <span class="badge bg-success-subtle text-success px-2 py-1 rounded small font-monospace" style="font-size: 10px;">AKTIF</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger px-2 py-1 rounded small font-monospace" style="font-size: 10px;">NON-AKTIF</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.skema.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary px-2 py-1 rounded-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.skema.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus skema ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1 rounded-2"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center p-5 text-muted"><i class="fa-solid fa-layer-group fa-2x mb-2 d-block opacity-50"></i> Belum ada data skema.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($skemas->hasPages())
            <div class="card-footer bg-white border-top p-3 d-flex justify-content-center">{{ $skemas->links('pagination::bootstrap-5') }}</div>
        @endif
    </div>
</div>
@endsection