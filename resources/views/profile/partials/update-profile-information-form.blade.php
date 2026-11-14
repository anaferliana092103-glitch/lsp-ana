<section>
    <header class="mb-3">
        <h3 class="h5 mb-1">Informasi Profil</h3>
        <p class="text-muted mb-0" style="font-size:.9rem;">Perbarui informasi profil dan alamat email akun Anda.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-3">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-input-label for="name" value="Nama" />
            <x-text-input id="name" name="name" type="text" class="mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-1" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-1" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 p-2 rounded" style="background: var(--ska-accent-soft); font-size:.88rem;">
                    Email Anda belum diverifikasi.
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline" style="color: var(--ska-accent);">
                        Kirim ulang tautan verifikasi.
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success mt-1">Tautan verifikasi baru telah dikirim.</div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-accent">Simpan</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success" style="font-size:.9rem;">Tersimpan.</span>
            @endif
        </div>
    </form>
</section>
