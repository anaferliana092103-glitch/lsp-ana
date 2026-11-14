<x-guest-layout>
    <div class="text-center mb-4">
        <div class="service-icon mx-auto mb-3"><i class="bi bi-shield-lock"></i></div>
        <h4 class="fw-bold mb-1">Konfirmasi Password</h4>
        <p class="text-muted mb-0" style="font-size:.92rem;">Ini adalah area aman. Masukkan password Anda sebelum melanjutkan.</p>
    </div>

    <div class="d-grid gap-2">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" class="mt-1" type="password" name="password" required autocomplete="current-password" autofocus />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <x-primary-button>Konfirmasi</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary rounded-pill w-100">Keluar</button>
        </form>
    </div>

</x-guest-layout>
