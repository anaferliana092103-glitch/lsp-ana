<x-app-layout>
    <x-slot name="header">
        <h2 class="h5 mb-0">Profil Akun</h2>
    </x-slot>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="admin-card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="admin-card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="admin-card">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="admin-card">
                <div class="card-header">Informasi Akun</div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0" style="font-size:.93rem; color:#46556d;">
                        <li class="mb-3">
                            <i class="bi bi-person me-2 text-primary"></i>{{ Auth::user()->name }}
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope me-2 text-primary"></i>{{ Auth::user()->email }}
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle me-2 text-success"></i>
                            {{ Auth::user()->hasVerifiedEmail() ? 'Email terverifikasi' : 'Email belum diverifikasi' }}
                        </li>
                        <li>
                            <i class="bi bi-calendar3 me-2 text-primary"></i>Bergabung {{ Auth::user()->created_at->translatedFormat('d F Y') }}
                        </li>
                    </ul>

                    <a href="{{ route('user.dashboard') }}" class="btn btn-navy w-100 mt-4">
                        <i class="bi bi-house me-1"></i> Kembali ke Dashboard User
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
