<x-guest-layout>
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">Lupa Password?</h4>
        <p class="text-muted mb-0" style="font-size:.92rem;">Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.</p>
    </div>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" value="Alamat Email" />
            <x-text-input id="email" class="mt-1" type="email" name="email" :value="old('email')"
                          placeholder="admin@solusikoneksi.co.id" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="d-grid gap-2">
            <x-primary-button>Kirim Tautan Reset</x-primary-button>

            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-outline-secondary rounded-pill">Kembali ke Halaman Login</a>
            @endif
        </div>
    </form>
</x-guest-layout>
