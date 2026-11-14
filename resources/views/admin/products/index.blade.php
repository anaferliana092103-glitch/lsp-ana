@extends('admin.layouts.app')

@section('title', 'Produk CCTV')

@section('content')
    <div class="admin-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span>Daftar Produk ({{ $products->total() }})</span>
            <div class="d-flex flex-wrap gap-2">
                <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex gap-2 flex-wrap">
                    <input type="text" name="q" class="form-control form-control-sm" style="width:160px;"
                           placeholder="Cari..." value="{{ $keyword }}">
                    <select name="kategori" class="form-select form-select-sm" style="width:150px;">
                        <option value="">Semua Kategori</option>
                        @foreach (\App\Models\Product::CATEGORIES as $item)
                            <option value="{{ $item }}" {{ $category === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('admin.products.create') }}" class="btn btn-navy btn-sm">
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
                            <th>Nama Produk</th>
                            <th style="width:120px;">Merek</th>
                            <th style="width:120px;">Kategori</th>
                            <th style="width:120px;">Harga</th>
                            <th style="width:100px;">Status</th>
                            <th style="width:110px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td><img src="{{ image_url($product->image) }}" class="table-thumb" alt="{{ $product->name }}"></td>
                                <td>
                                    <div class="fw-semibold">{{ $product->name }}</div>
                                </td>
                                <td>{{ $product->brand ?: '-' }}</td>
                                <td>
                                    @if($product->productCategory)
                                        <span class="badge bg-primary-subtle text-primary">{{ $product->productCategory->name }}</span>
                                    @else
                                        <span class="badge bg-light text-dark">{{ $product->category ?: '-' }}</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $product->price ?: 'Hubungi' }}</td>
                                <td>
                                    @if ($product->is_active)
                                        <span class="badge bg-success-subtle text-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline"
                                          data-confirm="Hapus produk '{{ $product->name }}'?">
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
                                <td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($products->hasPages())
        <div class="card-footer bg-white border-top">
            {{ $products->links() }}
        </div>
        @endif
    </div>
@endsection
