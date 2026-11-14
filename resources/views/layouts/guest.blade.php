<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login Admin') - {{ $settings['site_name'] ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ company_logo_url($company->logo ?? null) }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none">
                            <img src="{{ company_logo_url($company->logo ?? null) }}" alt="{{ $company->name }}"
                                 class="brand-logo" style="width:54px;height:54px;">
                            <span class="text-white text-start">
                                <span class="brand-name text-white" style="font-size:1.1rem;">{{ $company->name }}</span>
                                <span class="brand-tag text-white-50">Admin Panel</span>
                            </span>
                        </a>
                    </div>

                    <div class="auth-card">
                        {{ $slot }}
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="text-white-50 text-decoration-none" style="font-size:.9rem;">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
