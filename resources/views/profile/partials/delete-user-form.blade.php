<section>
    <header class="mb-3">
        <h3 class="h5 mb-1 text-danger">Hapus Akun</h3>
        <p class="text-muted mb-0" style="font-size:.9rem;">
            Setelah akun dihapus, seluruh data terkait akan dihapus secara permanen. Unduh informasi penting Anda sebelum melanjutkan.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}"
          data-confirm="Yakin ingin menghapus akun secara permanen?">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-danger rounded-pill">Hapus Akun</button>
    </form>
</section>
