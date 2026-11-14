<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', isset($header) ? strip_tags($header) : 'Dashboard') - Admin {{ $settings['site_name'] ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('layouts.navigation')

    <div class="admin-main">
        <div class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="admin-menu-btn" type="button" data-sidebar-toggle aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>
                @isset($header)
                    <div>{{ $header }}</div>
                @else
                    <h5>Dashboard</h5>
                @endisset
            </div>

            <div class="d-flex align-items-center gap-2">
                <span class="d-none d-sm-inline text-muted" style="font-size:.87rem;">
                    <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" data-confirm="Yakin Anda ingin keluar?">
                    @csrf
                    <button type="submit" class="btn btn-navy btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
