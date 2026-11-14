<x-guest-layout>
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">Login Pelanggan</h4>
        <p class="text-muted mb-0" style="font-size:.92rem;">Masuk untuk melihat produk, layanan, dan mengelola pesanan Anda.</p>
    </div>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('user.login') }}">
        @csrf

        <div class="mb-3">
            <x-input-label for="email" value="Alamat Email" />
            <x-text-input id="email" class="mt-1" type="email" name="email" :value="old('email')"
                          placeholder="email@contoh.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="mt-1" type="password" name="password"
                          placeholder="••••••••" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <label for="remember_me" class="form-check-label d-flex align-items-center gap-2" style="font-size:.9rem; color:#46556d;">
                <input id="remember_me" type="checkbox" class="form-check-input" style="margin-top:0;" name="remember">
                Ingat saya
            </label>

            <span></span>
        </div>

        <div class="d-flex align-items-center justify-content-between gap-3">
            <a href="{{ route('register') }}" class="text-decoration-none">Belum punya akun? Daftar</a>
            <x-primary-button>Masuk</x-primary-button>
        </div>
    </form>
</x-guest-layout>
