@php
    $crumbs = $crumbs ?? [];
@endphp

<section class="page-hero">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $title ?? 'Halaman' }}</h1>
                @if (! empty($subtitle))
                    <p class="mb-4" style="max-width: 640px; line-height: 1.8;">{{ $subtitle }}</p>
                @endif

                @if (count($crumbs))
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            @foreach ($crumbs as $label => $url)
                                @if ($url)
                                    <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                                @else
                                    <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</section>
