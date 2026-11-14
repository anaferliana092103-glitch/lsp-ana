@extends('admin.layouts.app')

@section('title', 'Layanan CCTV')

@section('content')
    <div class="admin-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span>Daftar Layanan ({{ $services->total() }})</span>
            <div class="d-flex flex-wrap gap-2">
                <form action="{{ route('admin.services.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="q" class="form-control form-control-sm" style="width:200px;"
                           placeholder="Cari..." value="{{ $keyword }}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('admin.services.create') }}" class="btn btn-navy btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-admin align-middle">
                    <thead>
                        <tr>
                            <th style="width:70px;">Gambar</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi Singkat</th>
                            <th style="width:80px;">Urutan</th>
                            <th style="width:100px;">Status</th>
                            <th style="width:110px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td>
                                    <img src="{{ image_url($service->image) }}" class="table-thumb" alt="{{ $service->name }}">
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $service->name }}</div>
                                </td>
                                <td style="max-width: 300px;">{{ \Illuminate\Support\Str::limit($service->short_description, 70) }}</td>
                                <td>{{ $service->ordering }}</td>
                                <td>
                                    @if ($service->is_active)
                                        <span class="badge bg-success-subtle text-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline"
                                          data-confirm="Hapus layanan '{{ $service->name }}'?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data layanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($services->hasPages())
        <div class="card-footer bg-white border-top">
            {{ $services->links() }}
        </div>
        @endif
    </div>
@endsection
