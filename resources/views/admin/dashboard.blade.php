@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="stat-card"><span class="si blue"><i class="bi bi-tools"></i></span><div><b>{{ $stats['services'] }}</b><span>Layanan CCTV</span></div></div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="stat-card"><span class="si navy"><i class="bi bi-camera-video"></i></span><div><b>{{ $stats['products'] }}</b><span>Produk CCTV</span></div></div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="stat-card"><span class="si green"><i class="bi bi-tag"></i></span><div><b>{{ $stats['categories'] }}</b><span>Kategori Produk</span></div></div>
        </div>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <h5 class="mb-2">Selamat datang di Admin Panel</h5>
            <p class="text-muted mb-0">Kelola layanan, kategori produk, dan katalog CCTV melalui menu di sebelah kiri.</p>
        </div>
    </div>
@endsection
