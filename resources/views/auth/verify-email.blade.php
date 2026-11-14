<x-guest-layout>
    <div class="text-center mb-4">
        <div class="service-icon mx-auto mb-3"><i class="bi bi-envelope-check"></i></div>
        <h4 class="fw-bold mb-1">Verifikasi Email</h4>
        <p class="text-muted mb-2" style="font-size:.92rem;">
            Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda dengan menekan tautan yang telah kami kirimkan ke email Anda.
        </p>
        @if (session('status') === 'verification-link-sent')
            <div class="alert alert-success py-2" style="font-size:.9rem;">
                Tautan verifikasi baru telah dikirim ke email Anda.
            </div>
        @endif
    </div>

    <div class="d-grid gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>Kirim Ulang Email Verifikasi</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary rounded-pill w-100">Keluar</button>
        </form>
    </div>
</x-guest-layout>
