@php
    $product = $product ?? null;
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header">Informasi Produk</div>
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label" for="name">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="150"
                               value="{{ old('name', $product->name ?? '') }}" placeholder="Contoh: CCTV Dome Indoor 2MP">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="brand">Merek</label>
                        <input type="text" class="form-control" id="brand" name="brand" maxlength="100"
                               value="{{ old('brand', $product->brand ?? '') }}" placeholder="Hikvision">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="product_category_id">Kategori Produk</label>
                        <select class="form-select" id="product_category_id" name="product_category_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('product_category_id', $product->product_category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Pilih kategori dari master kategori produk.</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="price">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" maxlength="60"
                               value="{{ old('price', $product->price ?? '') }}" placeholder="Rp 750.000">
                        <div class="form-text">Kosongkan untuk menampilkan "Hubungi Kami".</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="ordering">Urutan Tampil</label>
                        <input type="number" class="form-control" id="ordering" name="ordering" min="0" max="999"
                               value="{{ old('ordering', $product->ordering ?? 0) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Gambar Produk</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, SVG, WEBP (maks. 3MB).</div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="4"
                              placeholder="Deskripsi singkat produk...">{{ old('description', $product->description ?? '') }}</textarea>
                </div>

                <div class="mb-0">
                    <label class="form-label" for="specifications">Spesifikasi Singkat (satu baris per spesifikasi)</label>
                    <textarea class="form-control" id="specifications" name="specifications" rows="5"
                              placeholder="Resolusi 2MP (1920 x 1080)&#10;Infrared 20 meter&#10;Lensa 2.8mm">{{ old('specifications', $product->specifications ?? '') }}</textarea>
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
                           {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Aktif ditampilkan</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1"
                           {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Produk unggulan</label>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-accent">
                        <i class="bi bi-save me-1"></i> {{ isset($product) && $product->exists ? 'Simpan Perubahan' : 'Tambah Produk' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill">Batal</a>
                </div>
            </div>
        </div>

        @if (isset($product) && $product->image)
            <div class="admin-card">
                <div class="card-header">Gambar Saat Ini</div>
                <div class="card-body text-center">
                    <img src="{{ image_url($product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                </div>
            </div>
        @endif
    </div>
</div>
