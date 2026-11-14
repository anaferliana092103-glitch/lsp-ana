@php
    $adminMenu = [
        ['label' => 'Dashboard', 'icon' => 'bi-speedometer2', 'route' => 'admin.dashboard', 'match' => 'admin.dashboard|admin.home'],
        ['label' => 'Layanan CCTV', 'icon' => 'bi-tools', 'route' => 'admin.services.index', 'match' => 'admin.services.*'],
        ['label' => 'Produk CCTV', 'icon' => 'bi-camera-video', 'route' => 'admin.products.index', 'match' => 'admin.products.*'],
        ['label' => 'Kategori Produk', 'icon' => 'bi-tag', 'route' => 'admin.product-categories.index', 'match' => 'admin.product-categories.*'],
    ];
@endphp

<div class="sidebar-backdrop"></div>

<aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="brand-box mb-4 px-3 text-decoration-none d-block">
        <img src="{{ company_logo_url($company->logo ?? null) }}" alt="{{ $company->name }}" class="brand-logo" style="max-height: 36px;">
        <span class="ms-2">
            <span class="brand-name" style="font-size:.95rem;">{{ $company->name }}</span>
            <span class="brand-tag d-block" style="font-size:.75rem;">Admin Panel</span>
        </span>
    </a>

    <div class="admin-nav-title">Menu</div>

    <nav class="flex-grow-1">
        @foreach ($adminMenu as $menu)
            <a href="{{ route($menu['route']) }}"
               class="admin-link {{ request()->routeIs($menu['match']) ? 'active' : '' }}">
                <i class="bi {{ $menu['icon'] }}"></i>
                <span>{{ $menu['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div style="border-top: 1px solid #e5e7eb; margin: 1rem 0; padding-top: 1rem;">
        <a href="{{ route('home') }}" class="admin-link" target="_blank" rel="noopener">
            <i class="bi bi-globe"></i>
            <span>Lihat Website</span>
        </a>

        <form method="POST" action="{{ url('/admin/logout') }}" data-confirm="Yakin Anda ingin keluar?">
            @csrf
            <button type="submit" class="admin-link w-100 border-0 text-start" style="background: transparent;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
