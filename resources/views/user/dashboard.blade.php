@extends('frontend.layouts.app')
@section('title', 'Dashboard User')
@section('content')
<section class="section"><div class="container">@if(session('error'))<div class="alert alert-warning">{{ session('error') }}</div>@endif<h1 class="section-title">Selamat datang, {{ auth()->user()->name }}</h1><p class="section-desc">Pilih produk atau layanan yang ingin Anda ajukan.</p><div class="mt-4"><a href="{{ route('profile.edit') }}" class="btn btn-soft">Profil Akun</a></div><div class="d-flex gap-2 flex-wrap mt-4"><a href="{{ route('subscriptions.create') }}" class="btn btn-accent">Berlangganan</a><a href="{{ route('products.index') }}" class="btn btn-accent">Lihat Produk</a><a href="{{ route('services.index') }}" class="btn btn-navy">Lihat Layanan</a><a href="{{ route('orders.index') }}" class="btn btn-soft">Riwayat Berlangganan</a></div></div></section>
@endsection
