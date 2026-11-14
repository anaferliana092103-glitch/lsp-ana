@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="admin-card settings-card">
            <div class="card-header">Informasi Website</div>
            <div class="card-body">
                <div class="row g-3">
                    @foreach ($fields as $key => $label)
                        <div class="{{ in_array($key, ['site_description', 'hero_subtitle'], true) ? 'col-12' : 'col-md-6' }}">
                            <label class="form-label" for="{{ $key }}">{{ $label }}</label>
                            @if (in_array($key, ['site_description', 'hero_subtitle', 'footer_note'], true))
                                <textarea class="form-control" id="{{ $key }}" name="{{ $key }}" rows="3">{{ old($key, $settings[$key] ?? '') }}</textarea>
                            @else
                                <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $settings[$key] ?? '') }}">
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <button type="submit" class="btn btn-accent"><i class="bi bi-save me-1"></i>Simpan Pengaturan</button>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary"><i class="bi bi-eye me-1"></i>Lihat Website</a>
                </div>
            </div>
        </div>
    </form>
@endsection