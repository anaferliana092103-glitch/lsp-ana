<footer class="site-footer">
    <div class="container">
        <div class="row g-4 py-5">
            <div class="col-lg-4 col-md-6">
                <div class="brand-box mb-3">
                    <img src="{{ company_logo_url($company->logo ?? null) }}" alt="{{ $settings['site_name'] ?? $company->name }}" class="brand-logo">
                    <span>
                        <span class="brand-name">{{ $settings['site_name'] ?? $company->name }}</span>
                        <span class="brand-tag">{{ $company->tagline ?? 'Security & Technology' }}</span>
                    </span>
                </div>
                <p class="mb-4" style="color: #5b3b46; line-height: 1.8;">
                    {{ $settings['site_description'] ?? $settings['footer_note'] ?? $company->description ?? 'Menyediakan solusi CCTV dan sistem keamanan profesional.' }}
                </p>

                <div class="d-flex gap-2 flex-wrap">
                    @if ($company->facebook)
                        <a href="{{ $company->facebook }}" class="social-btn" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if ($company->instagram)
                        <a href="{{ $company->instagram }}" class="social-btn" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if ($company->youtube)
                        <a href="{{ $company->youtube }}" class="social-btn" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    @endif
                    @if ($company->tiktok)
                        <a href="{{ $company->tiktok }}" class="social-btn" target="_blank" rel="noopener" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    @endif
                    @if ($company->linkedin)
                        <a href="{{ $company->linkedin }}" class="social-btn" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <h6>Navigasi</h6>
                <a href="{{ route('home') }}" class="footer-link">Beranda</a>
                <a href="{{ route('about') }}" class="footer-link">Tentang Kami</a>
                <a href="{{ route('services.index') }}" class="footer-link">Layanan</a>
                <a href="{{ route('products.index') }}" class="footer-link">Produk CCTV</a>
                
                <a href="{{ route('gallery.index') }}" class="footer-link">Galeri</a>
                <a href="{{ route('contact') }}" class="footer-link">Kontak</a>
            </div>

            <div class="col-lg-3 col-md-6 col-6">
                <h6>Layanan Kami</h6>
                <span class="footer-link">Instalasi CCTV Rumah</span>
                <span class="footer-link">Instalasi CCTV Toko & Kantor</span>
                <span class="footer-link">Instalasi CCTV Sekolah</span>
                <span class="footer-link">CCTV Online & Monitoring HP</span>
                <span class="footer-link">Maintenance & Perbaikan CCTV</span>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6>Hubungi Kami</h6>
                <ul class="footer-info p-0 m-0">
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>{{ $company->address ?? $settings['address'] ?? '-' }}</span>
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        <a href="tel:{{ $company->phone }}" style="color: inherit;">{{ $company->phone ?? $settings['phone'] ?? '-' }}</a>
                    </li>
                    <li>
                        <i class="bi bi-whatsapp"></i>
                        <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin berkonsultasi.') }}" target="_blank" rel="noopener" style="color: inherit;">
                            {{ $settings['whatsapp_display'] ?? ('+' . ($company->whatsapp ?? '')) }}
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:{{ $company->email }}" style="color: inherit;">{{ $company->email ?? $settings['email'] ?? '-' }}</a>
                    </li>
                    <li>
                        <i class="bi bi-clock-fill"></i>
                        <span>{{ $company->working_hours ?? $settings['working_hours'] ?? '-' }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container pb-4">
            @php
                $footerAddress = $company->address ?? $settings['address'] ?? 'Depok, Sleman, Yogyakarta';
                $footerMap = $company->map_url ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($footerAddress);
            @endphp
            <a href="{{ $footerMap }}" class="footer-link d-inline-flex align-items-center gap-2" target="_blank" rel="noopener">
                <i class="bi bi-map"></i> Lihat lokasi kami di Google Maps
            </a>
        </div>

        <div class="footer-bottom d-flex flex-wrap justify-content-between gap-2">
            <span>&copy; {{ date('Y') }} {{ $company->name }}. Seluruh hak cipta dilindungi.</span>
            <span>{{ $settings['site_tagline'] ?? 'Solusi Keamanan & Teknologi Terpercaya' }}</span>
        </div>
    </div>
</footer>
