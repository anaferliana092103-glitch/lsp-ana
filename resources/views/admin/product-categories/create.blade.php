@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Produk')

@section('content')
    <div class="admin-card">
        <div class="card-header">Tambah Kategori Produk</div>
        <div class="card-body">
            <form action="{{ route('admin.product-categories.store') }}" method="POST">
                @csrf
                @include('admin.product-categories.form')
                
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-navy">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.product-categories.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
