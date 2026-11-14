@php
    $navItems = [
        ['label' => 'Beranda', 'route' => 'home'],
        ['label' => 'Tentang Kami', 'route' => 'about'],
        ['label' => 'Layanan', 'route' => 'services.index'],
        ['label' => 'Produk CCTV', 'route' => 'products.index'],
        ['label' => 'Galeri', 'route' => 'gallery.index'],
        ['label' => 'Kontak', 'route' => 'contact'],
    ];
@endphp

<nav class="navbar navbar-expand-lg fixed-top site-navbar">
    <div class="container">
        <a class="navbar-brand brand-box" href="{{ route('home') }}">
            <img src="{{ company_logo_url($company->logo ?? null) }}" alt="{{ $settings['site_name'] ?? $company->name }}" class="brand-logo">
            <span>
                <span class="brand-name">{{ $settings['site_name'] ?? $company->name }}</span>
                <span class="brand-tag">{{ $settings['site_tagline'] ?? $company->tagline ?? 'Security & Technology' }}</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3 text-navy"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                @foreach ($navItems as $item)
                    <li class="nav-item">
                        <a class="nav-link nav-link-site {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                           href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex align-items-center gap-2 flex-wrap">
                @auth
                    <a href="{{ route('user.dashboard') }}" class="btn btn-outline-primary btn-sm px-3">
                        <i class="bi bi-person me-1"></i> Akun Saya
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm px-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                @endauth
                <a href="{{ wa_link($company->whatsapp ?? '', 'Halo, saya ingin bertanya tentang layanan instalasi CCTV.') }}"
                   class="btn btn-accent btn-sm px-3" target="_blank" rel="noopener">
                    <i class="bi bi-whatsapp me-1"></i> Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</nav>
