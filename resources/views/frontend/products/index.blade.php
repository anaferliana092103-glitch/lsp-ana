@extends('frontend.layouts.app')

@section('title', 'Produk CCTV - ' . ($settings['site_name'] ?? config('app.name')))

@section('content')
    @include('frontend.partials.page-hero', [
        'title' => 'Produk CCTV',
        'subtitle' => 'Pilihan kamera CCTV, recorder, hard disk, dan aksesoris berkualitas dengan garansi resmi.',
        'crumbs' => ['Produk CCTV' => null],
    ])

    <section class="section">
        <div class="container">
            <div class="row g-4">
                @forelse ($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <div class="product-media">
                                <img src="{{ image_url($product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start gap-2">
                                    <span class="product-brand">{{ $product->brand ?: 'CCTV' }}</span>
                                    <span class="chip">{{ $product->category }}</span>
                                </div>
                                <h5 class="product-name mt-2">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>

                                @if ($product->specList())
                                    <ul class="spec-list">
                                        @foreach (array_slice($product->specList(), 0, 4) as $spec)
                                            <li><i class="bi bi-check2"></i><span>{{ $spec }}</span></li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="mt-auto pt-3 d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                    <span class="price-tag {{ $product->price ? '' : 'free' }}">{{ $product->priceLabel() }}</span>
                                    <a href="{{ auth()->check() ? route('orders.create', ['product' => $product->id]) : route('login') }}" class="btn btn-accent btn-sm">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-camera-video"></i>
                            <p class="mb-0">Produk pada kategori ini belum tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    <section class="section section-navy">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="mb-2">Butuh Bantuan Memilih Produk yang Tepat?</h2>
                    <p class="section-desc mb-0">Kami membantu menyesuaikan perangkat dengan lokasi, jumlah titik kamera, dan anggaran Anda.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya butuh rekomendasi produk CCTV.') }}" class="btn btn-accent" target="_blank" rel="noopener">
                        <i class="bi bi-whatsapp me-1"></i> Minta Rekomendasi
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
