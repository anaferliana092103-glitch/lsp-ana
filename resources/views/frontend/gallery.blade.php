@extends('frontend.layouts.app')
@section('title', 'Galeri - ' . ($settings['site_name'] ?? 'PT Net Koneksi Nusantara'))
@section('content')
@include('frontend.partials.page-hero', ['title' => 'Galeri Perusahaan', 'subtitle' => 'Dokumentasi kegiatan dan layanan kami.', 'crumbs' => ['Galeri' => null]])
<section class="section"><div class="container"><div class="row g-4">@forelse($galleries as $gallery)<div class="col-md-4"><div class="card h-100"><img src="{{ image_url($gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}"><div class="card-body"><h5>{{ $gallery->title }}</h5><p class="card-text">{{ $gallery->description }}</p></div></div></div>@empty<div class="col-12"><div class="empty-state">Belum ada galeri.</div></div>@endforelse</div></div></section>
@endsection
