<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $settings['site_description'] ?? 'Jasa instalasi CCTV dan sistem keamanan profesional.' }}">

    <title>@yield('title', ($settings['site_name'] ?? 'PT. Koneksi Net Nusantara'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ company_logo_url() }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>
    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    <a href="{{ wa_link($company->whatsapp ?? $settings['whatsapp'] ?? '', 'Halo ' . ($settings['site_name'] ?? 'PT. Koneksi Net Nusantara') . ', saya ingin berkonsultasi tentang layanan CCTV.') }}"
       class="wa-float" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <button class="back-top" type="button" aria-label="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </button>

    @stack('scripts')
</body>
</html>
