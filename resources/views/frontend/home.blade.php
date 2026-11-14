@extends('frontend.layouts.app')

@section('title', ($settings['site_name'] ?? config('app.name')) . ' - ' . ($settings['site_tagline'] ?? 'Solusi Keamanan Terpercaya'))

@section('content')
    {{-- HERO --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h1>{{ $settings['hero_title'] ?? 'Solusi Keamanan CCTV Terpercaya' }}</h1>
                    <p class="lead-text">
                        {{ $settings['hero_subtitle'] ?? 'PT. Solusi Koneksi Anda menyediakan jasa instalasi CCTV profesional dengan teknisi berpengalaman dan produk bergaransi resmi.' }}
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <a href="{{ route('services.index') }}" class="btn btn-accent">
                            Lihat Layanan <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-navy">
                            Hubungi Kami
                        </a>
                    </div>

                    <div class="hero-stats-simple">
                        <div class="stat-item">
                            <b>{{ $company->experience_years }}+</b>
                            <span>Tahun Pengalaman</span>
                        </div>
                        <div class="stat-item">
                            <b>{{ $company->project_count }}+</b>
                            <span>Proyek Selesai</span>
                        </div>
                        <div class="stat-item">
                            <b>{{ $company->client_count }}+</b>
                            <span>Klien Puas</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/hero-cctv.png') }}" alt="Sistem keamanan CCTV modern" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG --}}
    <section class="section section-soft">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('images/about-company.png') }}" alt="Tentang PT. Solusi Koneksi Anda" class="img-fluid rounded">
                </div>

                <div class="col-lg-6">
                    <h2>Tentang Kami</h2>
                    <p class="text-muted">{{ \Illuminate\Support\Str::limit($company->description ?? '', 300) }}</p>

                    <ul class="check-list">
                        <li><i class="bi bi-check-circle-fill"></i><span>Teknisi bersertifikat dan berpengalaman</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Produk CCTV original bergaransi resmi</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Pemasangan rapi dan profesional</span></li>
                        <li><i class="bi bi-check-circle-fill"></i><span>Layanan purna jual responsif</span></li>
                    </ul>

                    <a href="{{ route('about') }}" class="btn btn-navy mt-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN --}}
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Layanan Instalasi CCTV</h2>
                <p class="text-muted">Kami menyediakan berbagai layanan untuk memenuhi kebutuhan keamanan Anda</p>
            </div>

            <div class="row g-4">
                @forelse ($featuredServices as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-simple h-100 overflow-hidden">
                            <img src="{{ image_url($service->image) }}" alt="{{ $service->name }}" class="w-100" style="height: 190px; object-fit: cover;">
                            <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($service->short_description, 120) }}</p>
                            <a href="{{ route('services.show', $service) }}" class="card-link">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        Belum ada layanan yang ditambahkan.
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('services.index') }}" class="btn btn-navy">Lihat Semua Layanan</a>
            </div>
        </div>
    </section>

    {{-- PRODUK CCTV --}}
    <section class="section section-soft">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Produk CCTV Unggulan</h2>
                <p class="text-muted">Pilihan produk berkualitas dari merek terpercaya</p>
            </div>

            <div class="row g-4">
                @forelse ($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-product">
                            <div class="product-image">
                                <img src="{{ image_url($product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="card-body">
                                <span class="product-brand">{{ $product->brand ?: 'CCTV' }}</span>
                                <h5 class="product-name">{{ $product->name }}</h5>
                                @if($product->productCategory)
                                    <span class="badge badge-soft">{{ $product->productCategory->name }}</span>
                                @endif
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">{{ $product->priceLabel() }}</span>
                                    <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin bertanya tentang: ' . $product->name) }}" 
                                       class="btn btn-sm btn-whatsapp" target="_blank">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        Belum ada produk yang ditambahkan.
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-navy">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section section-cta">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-3">Butuh Instalasi CCTV?</h2>
                <p class="lead mb-4">Konsultasikan kebutuhan Anda dengan tim profesional kami</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin konsultasi instalasi CCTV.') }}" 
                       class="btn btn-accent btn-lg" target="_blank">
                        <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-navy btn-lg">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
