@extends('admin.layouts.app')

@section('title', 'Kategori Produk')

@section('content')
    <div class="admin-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span>Daftar Kategori Produk ({{ $categories->total() }})</span>
            <div class="d-flex flex-wrap gap-2">
                <form action="{{ route('admin.product-categories.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="q" class="form-control form-control-sm" style="width:200px;"
                           placeholder="Cari..." value="{{ $keyword }}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('admin.product-categories.create') }}" class="btn btn-navy btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-admin align-middle">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th style="width:400px;">Deskripsi</th>
                            <th style="width:100px;">Jumlah Produk</th>
                            <th style="width:80px;">Urutan</th>
                            <th style="width:100px;">Status</th>
                            <th style="width:110px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($category->description, 100) ?: '-' }}</td>
                                <td>{{ $category->products()->count() }}</td>
                                <td>{{ $category->ordering }}</td>
                                <td>
                                    @if ($category->is_active)
                                        <span class="badge bg-success-subtle text-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.product-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.product-categories.destroy', $category) }}" method="POST" class="d-inline"
                                          data-confirm="Hapus kategori '{{ $category->name }}'?">
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
                                <td colspan="6" class="text-center text-muted py-4">Belum ada kategori produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($categories->hasPages())
        <div class="card-footer bg-white border-top">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
@endsection
