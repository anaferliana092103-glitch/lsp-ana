@extends('frontend.layouts.app')

@section('title', 'Tentang Kami - ' . ($settings['site_name'] ?? config('app.name')))

@section('content')
    @include('frontend.partials.page-hero', [
        'title' => 'Tentang Kami',
        'subtitle' => 'Mengenal lebih dekat PT. Solusi Koneksi Anda, perusahaan teknologi dan keamanan yang berfokus pada jasa instalasi CCTV.',
        'crumbs' => ['Tentang Kami' => null],
    ])

    {{-- PROFIL PERUSAHAAN --}}
    <section class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-media">
                        <img src="{{ asset('images/about-company.png') }}" alt="Profil {{ $company->name }}">
                        <div class="experience">
                            <b>{{ $company->established_year ?? '2015' }}</b>
                            <span>Berdiri<br>Sejak</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="section-head">
                        <span class="eyebrow">Profil Perusahaan</span>
                        <h2 class="section-title">{{ $company->name }}</h2>
                        <div class="title-line"></div>
                        <p class="section-desc">{{ $company->description }}</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-geo-alt-fill"></i></span>
                                <div>
                                    <h6>Alamat Kantor</h6>
                                    <p>{{ $company->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-telephone-fill"></i></span>
                                <div>
                                    <h6>Telepon</h6>
                                    <p><a href="tel:{{ $company->phone }}">{{ $company->phone }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-envelope-fill"></i></span>
                                <div>
                                    <h6>Email</h6>
                                    <p><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-clock-fill"></i></span>
                                <div>
                                    <h6>Jam Operasional</h6>
                                    <p>{{ $company->working_hours }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SEJARAH --}}
    <section class="section section-soft">
        <div class="container">
            <div class="section-head center">
                <span class="eyebrow">Sejarah Perusahaan</span>
                <h2 class="section-title">Perjalanan Kami Melayani Kebutuhan Keamanan</h2>
                <div class="title-line"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <div class="row g-4">
                                <div class="col-lg-7">
                                    @foreach (preg_split('/\n\n/', (string) $company->history) as $index => $paragraph)
                                        @if (trim($paragraph) !== '')
                                            <p class="{{ $index === 0 ? 'fw-medium' : '' }}" style="line-height: 1.9; color: #46556d;">{{ trim($paragraph) }}</p>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-lg-5">
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <b>{{ $company->established_year ?? '2015' }}</b>
                                            <span style="color:#46556d;">Perusahaan berdiri dan fokus pada instalasi CCTV rumah serta toko kecil di Yogyakarta.</span>
                                        </div>
                                        <div class="timeline-item">
                                            <b>2018</b>
                                            <span style="color:#46556d;">Memperluas layanan ke sekolah, perkantoran, dan konfigurasi monitoring online via HP.</span>
                                        </div>
                                        <div class="timeline-item">
                                            <b>2021</b>
                                            <span style="color:#46556d;">Menambah divisi maintenance dan kontrak layanan purna jual untuk pelanggan usaha.</span>
                                        </div>
                                        <div class="timeline-item mb-0">
                                            <b>{{ date('Y') }}</b>
                                            <span style="color:#46556d;">{{ $company->project_count }}+ proyek terselesaikan bersama {{ $company->client_count }}+ pelanggan dari berbagai daerah.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VISI MISI --}}
    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="vision-card">
                        <div class="vc-icon"><i class="bi bi-eye-fill"></i></div>
                        <span class="eyebrow">Visi Perusahaan</span>
                        <h3 class="mt-2 mb-3">Visi Kami</h3>
                        <p class="mb-0" style="color: #5b3b46; line-height: 1.9;">{{ $company->vision }}</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mission-card">
                        <div class="service-icon"><i class="bi bi-flag-fill"></i></div>
                        <span class="eyebrow">Misi Perusahaan</span>
                        <h3 class="mt-2 mb-3">Misi Kami</h3>
                        <div style="color: #46556d; line-height: 1.9;">
                            @foreach (preg_split('/\r\n|\r|\n/', (string) $company->mission) as $line)
                                @if (trim($line) !== '')
                                    <p class="mb-2">{{ trim($line) }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KOMITMEN --}}
    <section class="section section-navy">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="eyebrow">Komitmen Kami</span>
                    <h2 class="section-title">Keamanan Pelanggan adalah Tanggung Jawab Kami</h2>
                    <div class="title-line"></div>
                    <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin berkonsultasi kebutuhan CCTV.') }}" class="btn btn-accent mt-2" target="_blank" rel="noopener">
                        <i class="bi bi-whatsapp me-1"></i> Konsultasi Sekarang
                    </a>
                </div>

                <div class="col-lg-7">
                    <p class="section-desc mb-4">{{ $company->commitment }}</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="feature-card">
                                <div class="fi"><i class="bi bi-search"></i></div>
                                <h6 class="mb-1">Survei &amp; Konsultasi Jujur</h6>
                                <p class="card-text mb-0">Rekomendasi perangkat sesuai kebutuhan, bukan sekadar yang paling mahal.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-card">
                                <div class="fi"><i class="bi bi-tools"></i></div>
                                <h6 class="mb-1">Garansi &amp; Maintenance</h6>
                                <p class="card-text mb-0">Garansi pemasangan serta layanan perawatan berkala agar sistem selalu prima.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
