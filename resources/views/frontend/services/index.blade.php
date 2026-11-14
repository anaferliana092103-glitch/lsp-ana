@extends('frontend.layouts.app')

@section('title', 'Layanan - ' . ($settings['site_name'] ?? config('app.name')))

@section('content')
    @include('frontend.partials.page-hero', [
        'title' => 'Layanan Kami',
        'subtitle' => 'Layanan instalasi dan perawatan CCTV profesional untuk rumah, bisnis, sekolah, dan kebutuhan keamanan lainnya.',
        'crumbs' => ['Layanan' => null],
    ])

    <section class="section">
        <div class="container">
            <div class="row g-4">
                @forelse ($services as $service)
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-service h-100">
                            <img src="{{ image_url($service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $service->name }}</h4>
                                <p class="card-text">{{ $service->short_description }}</p>

                                @if ($service->featureList())
                                    <ul class="check-list mt-2">
                                        @foreach (array_slice($service->featureList(), 0, 3) as $feature)
                                            <li><span>{{ $feature }}</span></li>
                                        @endforeach
                                    </ul>
                                @endif

                                <a href="{{ route('services.show', $service) }}" class="btn btn-navy mt-auto align-self-start">
                                    Detail Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-tools"></i>
                            <p class="mb-0">Belum ada layanan yang tersedia saat ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="cta-box">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <h2 class="mb-2">Belum Yakin Butuh Layanan yang Mana?</h2>
                        <p class="mb-0">Ceritakan kebutuhan Anda, tim kami akan merekomendasikan solusi dan perkiraan biaya yang paling sesuai.</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex flex-wrap gap-3 justify-content-lg-end">
                            <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin konsultasi layanan instalasi CCTV.') }}" class="btn btn-accent" target="_blank" rel="noopener">
                                <i class="bi bi-whatsapp me-1"></i> Konsultasi Gratis
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-navy">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
