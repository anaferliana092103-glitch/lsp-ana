<x-filament-panels::page>
    <div class="website-settings-page">
        <style>
            .website-settings-page { max-width: 900px; margin: 0 auto; }
            .website-settings-page .settings-section {
                background: #fffafb;
                border: 1px solid #eadde2;
                border-radius: 8px;
                padding: 1.25rem;
                margin-bottom: 1rem;
            }
            .website-settings-page .settings-section h2 {
                color: #8f4d62;
                font-size: 1rem;
                font-weight: 600;
                margin: 0 0 1rem;
                padding-bottom: .7rem;
                border-bottom: 1px solid #f0e3e7;
            }
            .website-settings-page .field { margin-bottom: 1rem; }
            .website-settings-page .field:last-child { margin-bottom: 0; }
            .website-settings-page label {
                display: block;
                color: #4b3d46;
                font-size: .875rem;
                font-weight: 500;
                margin-bottom: .4rem;
            }
            .website-settings-page input,
            .website-settings-page textarea {
                display: block;
                width: 100%;
                min-height: 42px;
                border: 1px solid #d9cbd1;
                border-radius: 6px;
                background: #fff;
                color: #3f3540;
                padding: .6rem .75rem;
                font-size: .9rem;
                outline: none;
                transition: border-color .15s ease, box-shadow .15s ease;
            }
            .website-settings-page textarea { min-height: 110px; resize: vertical; }
            .website-settings-page input:focus,
            .website-settings-page textarea:focus {
                border-color: #e8a9b9;
                box-shadow: 0 0 0 3px rgba(232, 169, 185, .18);
            }
            .website-settings-page .form-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1rem 1.25rem;
            }
            .website-settings-page .full { grid-column: 1 / -1; }
            .website-settings-page .actions {
                display: flex;
                justify-content: flex-end;
                padding-top: .25rem;
            }
            .website-settings-page .save-button {
                border: 0;
                border-radius: 6px;
                background: #e8a9b9;
                color: #fff;
                cursor: pointer;
                font-size: .9rem;
                font-weight: 600;
                padding: .65rem 1rem;
            }
            .website-settings-page .save-button:hover { background: #d98ea2; }
            .website-settings-page .error { color: #b42318; font-size: .8rem; margin-top: .3rem; }
            @media (max-width: 640px) {
                .website-settings-page .settings-section { padding: 1rem; }
                .website-settings-page .form-grid { grid-template-columns: 1fr; gap: 0; }
                .website-settings-page .full { grid-column: auto; }
                .website-settings-page .actions { justify-content: stretch; }
                .website-settings-page .save-button { width: 100%; }
            }
        </style>

        <form wire:submit="save">
            <section class="settings-section">
                <h2>Informasi Perusahaan</h2>
                <div class="form-grid">
                    <div class="field full">
                        <label for="site_name">Nama perusahaan</label>
                        <input id="site_name" type="text" wire:model="site_name" placeholder="PT. Koneksi Net Nusantara">
                        @error('site_name') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field full">
                        <label for="address">Alamat perusahaan</label>
                        <input id="address" type="text" wire:model="address">
                        @error('address') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            <section class="settings-section">
                <h2>Kontak Perusahaan</h2>
                <div class="form-grid">
                    <div class="field">
                        <label for="phone">Nomor telepon</label>
                        <input id="phone" type="text" wire:model="phone">
                        @error('phone') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label for="email">Email perusahaan</label>
                        <input id="email" type="email" wire:model="email">
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field full">
                        <label for="whatsapp">Nomor WhatsApp</label>
                        <input id="whatsapp" type="text" wire:model="whatsapp">
                        @error('whatsapp') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            <section class="settings-section">
                <h2>Deskripsi Perusahaan</h2>
                <div class="field">
                    <label for="site_description">Deskripsi singkat perusahaan</label>
                    <textarea id="site_description" wire:model="site_description"></textarea>
                    @error('site_description') <div class="error">{{ $message }}</div> @enderror
                </div>
            </section>

            <div class="actions">
                <button type="submit" class="save-button">Simpan Pengaturan</button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
