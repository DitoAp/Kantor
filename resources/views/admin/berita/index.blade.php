@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('admin_content')
<div class="container-fluid p-0">
    
    <!-- Header Page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Manajemen Berita & Kegiatan</h4>
            <p class="text-muted small m-0 mt-1">Daftar seluruh rilis pers, artikel, dan dokumentasi agenda pariwisata.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-dark-premium rounded-3 small">
            <i class="fa-solid fa-plus me-2"></i> Tambah Berita Baru
        </a>
    </div>

    <!-- Alert Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2" role="alert">
            <i class="fa-solid fa-circle-check text-success"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Tabel Data Clean Card -->
    <div class="card card-custom border-0 overflow-hidden shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead class="table-light text-uppercase font-monospace text-muted" style="font-size: 11px; border-bottom: 1px solid var(--border-admin);">
                    <tr>
                        <th class="ps-4 py-3" style="width: 60px;">No</th>
                        <th style="width: 100px;">Gambar</th>
                        <th>Judul Berita / Rilis</th>
                        <th style="width: 150px;">Tanggal Diinput</th>
                        <th style="width: 120px;">Status</th>
                        <th class="text-end pe-4" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($beritas as $index => $item)
                        <tr>
                            <td class="ps-4 fw-medium text-muted">{{ $beritas->firstItem() + $index }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded object-cover" style="width: 60px; height: 45px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded text-center text-muted py-2" style="width: 60px; height: 45px;"><i class="fa-regular fa-image opacity-50"></i></div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark text-truncate" style="max-width: 400px;">{{ $item->judul }}</div>
                                <small class="text-muted font-monospace" style="font-size: 11px;">slug: {{ Str::limit($item->slug, 40) }}</small>
                            </td>
                            <td class="text-muted">{{ $item->created_at->translatedFormat('d M Y') }}</td>
                            <td>
                                @if($item->status == 'publish')
                                    <span class="badge bg-success-subtle text-success px-2 py-1 rounded small text-uppercase font-monospace" style="font-size: 10px;">Publish</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded small text-uppercase font-monospace" style="font-size: 10px;">Draft</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary px-2 py-1 rounded-2" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1 rounded-2" title="Hapus">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-5 text-muted">
                                <i class="fa-regular fa-folder-open fa-2x mb-2 d-block opacity-50"></i>
                                <span>Belum ada data berita yang ditambahkan.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if($beritas->hasPages())
            <div class="card-footer bg-white border-top border-light p-3 d-flex justify-content-center">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
@endsection