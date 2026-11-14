@extends('frontend.layouts.app')

@section('title', 'Kontak - ' . ($settings['site_name'] ?? config('app.name')))

@section('content')
    @include('frontend.partials.page-hero', [
        'title' => 'Hubungi Kami',
        'subtitle' => 'Konsultasikan kebutuhan keamanan Anda. Kami siap membantu melalui telepon, email, maupun WhatsApp.',
        'crumbs' => ['Kontak' => null],
    ])

    <section class="section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="section-head center">
                        <span class="eyebrow">Informasi Kontak</span>
                        <h2 class="section-title">Kami Siap Membantu Anda</h2>
                        <div class="title-line"></div>
                        <p class="section-desc">Hubungi kami untuk konsultasi, survei lokasi, maupun pemesanan jasa instalasi CCTV.</p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-geo-alt-fill"></i></span>
                                <div>
                                    <h6>Alamat Perusahaan</h6>
                                    <p>{{ $company->address ?? $settings['address'] ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-clock-fill"></i></span>
                                <div>
                                    <h6>Jam Operasional</h6>
                                    <p>{{ $company->working_hours ?? $settings['working_hours'] ?? 'Senin - Sabtu: 08.00 - 17.00 WIB' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-whatsapp"></i></span>
                                <div>
                                    <h6>WhatsApp</h6>
                                    <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin berkonsultasi.') }}" target="_blank" rel="noopener">
                                        {{ $settings['whatsapp_display'] ?? ('+' . ($company->whatsapp ?? '')) }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-telephone-fill"></i></span>
                                <div>
                                    <h6>Telepon</h6>
                                    <a href="tel:{{ $company->phone }}">{{ $company->phone ?? $settings['phone'] ?? '-' }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-card">
                                <span class="ii"><i class="bi bi-envelope-fill"></i></span>
                                <div>
                                    <h6>Email</h6>
                                    <a href="mailto:{{ $company->email }}">{{ $company->email ?? $settings['email'] ?? '-' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if (session('success'))
                        <div class="alert alert-success mt-4">{{ session('success') }}</div>
                        @if (session('whatsapp_url'))
                            <div class="text-center mb-4">
                                <a href="{{ session('whatsapp_url') }}" class="btn btn-whatsapp" target="_blank" rel="noopener">
                                    <i class="bi bi-whatsapp me-1"></i> Lanjutkan ke WhatsApp
                                </a>
                            </div>
                        @endif
                    @endif

                    <div class="admin-card mt-4">
                        <div class="card-header">Formulir Konsultasi CCTV</div>
                        <div class="card-body">
                            <p class="text-muted">Isi formulir berikut sebelum melanjutkan percakapan melalui WhatsApp.</p>
                            <form method="POST" action="{{ route('contact.consultation') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input name="customer_name" value="{{ old('customer_name') }}" class="form-control" required></div>
                                    <div class="col-md-6"><label class="form-label">Nomor WhatsApp</label><input name="whatsapp" value="{{ old('whatsapp') }}" class="form-control" required></div>
                                    <div class="col-md-6"><label class="form-label">Layanan CCTV</label><select name="service_id" class="form-select"><option value="">Pilih layanan</option>@foreach($services as $service)<option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>{{ $service->name }}</option>@endforeach</select></div>
                                    <div class="col-md-6"><label class="form-label">Alamat</label><input name="address" value="{{ old('address') }}" class="form-control" required></div>
                                    <div class="col-12"><label class="form-label">Isi Pesan atau Kebutuhan</label><textarea name="notes" rows="4" class="form-control" required>{{ old('notes') }}</textarea></div>
                                    <div class="col-12"><button class="btn btn-accent" type="submit"><i class="bi bi-send me-1"></i> Kirim Permintaan</button></div>
                                </div>
                            </form>
                            @if ($errors->any())<div class="alert alert-danger mt-3 mb-0">{{ $errors->first() }}</div>@endif
                        </div>
                    </div>

                    @php
                        $companyAddress = $company->address ?? $settings['address'] ?? 'Depok, Sleman, Yogyakarta';
                        $mapUrl = $company->map_url ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($companyAddress);
                        $mapEmbedUrl = 'https://www.google.com/maps?q=' . urlencode($companyAddress) . '&output=embed';
                    @endphp

                    <div class="row g-4 align-items-stretch mt-2">
                        <div class="col-lg-8">
                            <div class="card h-100 overflow-hidden">
                                <iframe
                                    src="{{ $mapEmbedUrl }}"
                                    title="Lokasi {{ $company->name }}"
                                    width="100%"
                                    height="360"
                                    style="border:0; min-height:360px;"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-card h-100 flex-column">
                                <span class="ii"><i class="bi bi-map"></i></span>
                                <div>
                                    <h6>Lokasi Kantor</h6>
                                    <p>{{ $companyAddress }}</p>
                                    <a href="{{ $mapUrl }}" class="btn btn-navy btn-sm mt-3" target="_blank" rel="noopener">
                                        <i class="bi bi-sign-turn-right me-1"></i> Petunjuk Arah
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ wa_link($company->whatsapp ?? '', 'Halo ' . ($settings['site_name'] ?? 'PT. Koneksi Net Nusantara') . ', saya ingin konsultasi dan memesan jasa instalasi CCTV.') }}"
                           class="btn btn-whatsapp btn-lg" target="_blank" rel="noopener">
                            <i class="bi bi-whatsapp me-2"></i> Konsultasi &amp; Pemesanan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
