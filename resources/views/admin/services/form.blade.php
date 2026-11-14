@php
    $service = $service ?? null;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header">Informasi Layanan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Layanan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="150"
                           value="{{ old('name', $service->name ?? '') }}" placeholder="Contoh: Instalasi CCTV Rumah">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="icon">Ikon (Bootstrap Icons)</label>
                        <input type="text" class="form-control" id="icon" name="icon" maxlength="50"
                               value="{{ old('icon', $service->icon ?? '') }}" placeholder="bi-house-door">
                        <div class="form-text">Gunakan kelas ikon seperti <code>bi-house-door</code>.</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="ordering">Urutan Tampil</label>
                        <input type="number" class="form-control" id="ordering" name="ordering" min="0" max="999"
                               value="{{ old('ordering', $service->ordering ?? 0) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="image">Gambar Layanan</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, SVG, WEBP (maks. 3MB).</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="short_description">Deskripsi Singkat</label>
                    <input type="text" class="form-control" id="short_description" name="short_description" maxlength="255"
                           value="{{ old('short_description', $service->short_description ?? '') }}"
                           placeholder="Ringkasan layanan yang tampil pada card">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Deskripsi Lengkap</label>
                    <textarea class="form-control" id="description" name="description" rows="6"
                              placeholder="Penjelasan lengkap layanan...">{{ old('description', $service->description ?? '') }}</textarea>
                </div>

                <div class="mb-0">
                    <label class="form-label" for="features">Daftar Fitur (satu baris per fitur)</label>
                    <textarea class="form-control" id="features" name="features" rows="5"
                              placeholder="Survei lokasi gratis&#10;Kamera indoor dan outdoor&#10;Garansi pemasangan">{{ old('features', $service->features ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header">Status</div>
            <div class="card-body">
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Aktif ditampilkan</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1"
                           {{ old('is_featured', $service->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Layanan unggulan (beranda)</label>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-accent">
                        <i class="bi bi-save me-1"></i> {{ isset($service) && $service->exists ? 'Simpan Perubahan' : 'Tambah Layanan' }}
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary rounded-pill">Batal</a>
                </div>
            </div>
        </div>

        @if (isset($service) && $service->image)
            <div class="admin-card">
                <div class="card-header">Gambar Saat Ini</div>
                <div class="card-body">
                    <img src="{{ image_url($service->image) }}" class="img-fluid rounded" alt="{{ $service->name }}">
                </div>
            </div>
        @endif
    </div>
</div>
