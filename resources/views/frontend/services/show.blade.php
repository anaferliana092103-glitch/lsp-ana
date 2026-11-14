@extends('frontend.layouts.app')

@section('title', $service->name . ' - ' . ($settings['site_name'] ?? config('app.name')))

@section('content')
    @include('frontend.partials.page-hero', [
        'title' => $service->name,
        'subtitle' => $service->short_description,
        'crumbs' => ['Layanan' => route('services.index'), $service->name => null],
    ])

    <section class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <img src="{{ image_url($service->image) }}" alt="{{ $service->name }}"
                             class="w-100" style="border-radius: var(--ska-radius); box-shadow: var(--ska-shadow-sm);">
                    </div>

                    <h2 class="section-title">{{ $service->name }}</h2>
                    <div class="title-line"></div>

                    <div style="color: #46556d; line-height: 1.9;">
                        {!! nl2br(e($service->description)) !!}
                    </div>

                    @if ($service->featureList())
                        <h5 class="mt-4 mb-3">Apa yang Anda Dapatkan</h5>
                        <ul class="check-list">
                            @foreach ($service->featureList() as $feature)
                                <li><span>{{ $feature }}</span></li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="{{ auth()->check() ? route('orders.create', ['service' => $service->id]) : route('login') }}" class="btn btn-accent">
                            Pesan Sekarang
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-navy">Minta Penawaran</a>
                    </div>
                </div>

                <aside class="col-lg-5">
                    <div class="admin-card mb-4">
                        <div class="card-header">Informasi Layanan</div>
                        <div class="card-body">
                            <ul class="footer-info p-0 m-0" style="color:#46556d;">
                                <li style="color:#46556d;">
                                    <i class="bi bi-building" style="color: var(--ska-accent);"></i>
                                    <span>{{ $company->name }}</span>
                                </li>
                                <li style="color:#46556d;">
                                    <i class="bi bi-geo-alt" style="color: var(--ska-accent);"></i>
                                    <span>{{ $company->address }}</span>
                                </li>
                                <li style="color:#46556d;">
                                    <i class="bi bi-telephone" style="color: var(--ska-accent);"></i>
                                    <span>{{ $company->phone }}</span>
                                </li>
                                <li style="color:#46556d;">
                                    <i class="bi bi-clock" style="color: var(--ska-accent);"></i>
                                    <span>{{ $company->working_hours }}</span>
                                </li>
                            </ul>
                            <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin bertanya tentang layanan ' . $service->name) }}"
                               class="btn btn-whatsapp w-100 mt-3" target="_blank" rel="noopener">
                                <i class="bi bi-whatsapp me-1"></i> Konsultasi via WhatsApp
                            </a>
                        </div>
                    </div>

                    @if ($otherServices->isNotEmpty())
                        <div class="admin-card">
                            <div class="card-header">Layanan Lainnya</div>
                            <div class="card-body">
                                @foreach ($otherServices as $other)
                                    <a href="{{ route('services.show', $other) }}"
                                       class="d-flex align-items-center gap-3 py-2 text-dark"
                                       style="border-bottom: 1px dashed rgba(11,37,69,.12);">
                                        <span class="fw-semibold" style="font-size:.95rem;">{{ $other->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>
@endsection
