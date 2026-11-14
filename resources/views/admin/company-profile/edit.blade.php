@extends('admin.layouts.app')

@section('title', 'Profil Perusahaan')

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

    <form action="{{ route('admin.company-profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="admin-card mb-4">
                    <div class="card-header">Identitas Perusahaan</div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label" for="name">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required maxlength="150"
                                       value="{{ old('name', $profile->name) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="established_year">Tahun Berdiri</label>
                                <input type="text" class="form-control" id="established_year" name="established_year" maxlength="10"
                                       value="{{ old('established_year', $profile->established_year) }}" placeholder="2015">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="tagline">Tagline</label>
                                <input type="text" class="form-control" id="tagline" name="tagline" maxlength="150"
                                       value="{{ old('tagline', $profile->tagline) }}" placeholder="Solusi Keamanan & Teknologi Terpercaya">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="description">Deskripsi Perusahaan</label>
                                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $profile->description) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="logo">Logo Perusahaan</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                <div class="form-text">Disarankan PNG/SVG berukuran minimal 200x200 px.</div>
                            </div>
                        </div>

                        @if ($profile->logo)
                            <div class="mt-3">
                                <div class="form-label">Logo Saat Ini</div>
                                <img src="{{ image_url($profile->logo) }}" alt="Logo" class="rounded" style="max-height:70px; background:#f2f6fb; padding:6px;">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="admin-card mb-4">
                    <div class="card-header">Sejarah &amp; Komitmen</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="history">Sejarah Perusahaan</label>
                            <textarea class="form-control" id="history" name="history" rows="6"
                                      placeholder="Tulis sejarah perusahaan, pisahkan paragraf dengan baris kosong.">{{ old('history', $profile->history) }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label" for="commitment">Komitmen Perusahaan</label>
                            <textarea class="form-control" id="commitment" name="commitment" rows="4">{{ old('commitment', $profile->commitment) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="admin-card mb-4">
                    <div class="card-header">Visi &amp; Misi</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="vision">Visi</label>
                            <textarea class="form-control" id="vision" name="vision" rows="3">{{ old('vision', $profile->vision) }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label" for="mission">Misi (satu nomor per baris)</label>
                            <textarea class="form-control" id="mission" name="mission" rows="6"
                                      placeholder="1. Memberikan solusi keamanan...&#10;2. Memasang perangkat berkualitas...">{{ old('mission', $profile->mission) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <div class="card-header">Kontak &amp; Media Sosial</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="address">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="2" maxlength="255">{{ old('address', $profile->address) }}</textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="phone">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="40"
                                       value="{{ old('phone', $profile->phone) }}" placeholder="0274-889-9001">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="whatsapp">Nomor WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" maxlength="40"
                                       value="{{ old('whatsapp', $profile->whatsapp) }}" placeholder="6281234567890">
                                <div class="form-text">Format internasional tanpa tanda "+".</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                       value="{{ old('email', $profile->email) }}">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="working_hours">Jam Operasional</label>
                                <input type="text" class="form-control" id="working_hours" name="working_hours" maxlength="100"
                                       value="{{ old('working_hours', $profile->working_hours) }}" placeholder="Senin - Sabtu, 08.00 - 17.00 WIB">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="map_url">Tautan Google Maps</label>
                                <input type="url" class="form-control" id="map_url" name="map_url"
                                       value="{{ old('map_url', $profile->map_url) }}" placeholder="https://maps.google.com/...">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="url" class="form-control" id="facebook" name="facebook"
                                       value="{{ old('facebook', $profile->facebook) }}" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input type="url" class="form-control" id="instagram" name="instagram"
                                       value="{{ old('instagram', $profile->instagram) }}" placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="youtube">YouTube</label>
                                <input type="url" class="form-control" id="youtube" name="youtube"
                                       value="{{ old('youtube', $profile->youtube) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="tiktok">TikTok</label>
                                <input type="url" class="form-control" id="tiktok" name="tiktok"
                                       value="{{ old('tiktok', $profile->tiktok) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="linkedin">LinkedIn</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                       value="{{ old('linkedin', $profile->linkedin) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="admin-card mb-4">
                    <div class="card-header">Statistik Beranda</div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label" for="experience_years">Tahun</label>
                                <input type="number" class="form-control" id="experience_years" name="experience_years" min="0" max="99"
                                       value="{{ old('experience_years', $profile->experience_years) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="project_count">Proyek</label>
                                <input type="number" class="form-control" id="project_count" name="project_count" min="0"
                                       value="{{ old('project_count', $profile->project_count) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="client_count">Klien</label>
                                <input type="number" class="form-control" id="client_count" name="client_count" min="0"
                                       value="{{ old('client_count', $profile->client_count) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="team_count">Tim</label>
                                <input type="number" class="form-control" id="team_count" name="team_count" min="0"
                                       value="{{ old('team_count', $profile->team_count) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <div class="card-header">Aksi</div>
                    <div class="card-body d-grid gap-2">
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-save me-1"></i> Simpan Profil
                        </button>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary rounded-pill">
                            <i class="bi bi-eye me-1"></i> Lihat Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
