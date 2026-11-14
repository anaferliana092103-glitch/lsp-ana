@extends('frontend.layouts.app')
@section('title', 'Form Pemesanan')
@section('content')
<section class="section"><div class="container" style="max-width:760px"><div class="card p-4">
<h2 class="section-title">Pesan Sekarang</h2><p class="text-muted">{{ $product?->name ?? $service?->name }}</p>
<form method="POST" action="{{ route('orders.store') }}">@csrf
@if($product)<input type="hidden" name="product_id" value="{{ $product->id }}">@else<input type="hidden" name="service_id" value="{{ $service->id }}">@endif
<div class="row g-3"><div class="col-md-6"><label class="form-label">Nama pelanggan</label><input name="customer_name" class="form-control" value="{{ old('customer_name', auth()->user()->name) }}" required></div><div class="col-md-6"><label class="form-label">Nomor WhatsApp</label><input name="whatsapp" class="form-control" value="{{ old('whatsapp') }}" required></div><div class="col-12"><label class="form-label">Alamat</label><textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea></div><div class="col-md-4"><label class="form-label">Jumlah</label><input name="quantity" type="number" min="1" value="{{ old('quantity', 1) }}" class="form-control" required></div><div class="col-12"><label class="form-label">Catatan tambahan</label><textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea></div></div><button class="btn btn-accent mt-4">Kirim Pesanan</button></form>
</div></div></section>
@endsection
