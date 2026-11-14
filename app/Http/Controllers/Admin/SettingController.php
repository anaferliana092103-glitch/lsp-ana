<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    private const FIELDS = [
        'site_name' => 'Nama Website',
        'site_tagline' => 'Tagline Website',
        'site_description' => 'Deskripsi Website',
        'hero_title' => 'Judul Banner Beranda',
        'hero_subtitle' => 'Deskripsi Banner Beranda',
        'whatsapp' => 'Nomor WhatsApp (format internasional, contoh: 6281234567890)',
        'whatsapp_display' => 'Nomor WhatsApp (tampilan)',
        'phone' => 'Nomor Telepon',
        'email' => 'Email Perusahaan',
        'address' => 'Alamat Perusahaan',
        'working_hours' => 'Jam Operasional',
        'footer_note' => 'Catatan Footer',
    ];

    public function edit(): View
    {
        $settings = WebsiteSetting::asArray();

        return view('admin.settings.edit', [
            'fields' => self::FIELDS,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['nullable', 'string', 'max:150'],
            'site_tagline' => ['nullable', 'string', 'max:150'],
            'site_description' => ['nullable', 'string', 'max:500'],
            'hero_title' => ['nullable', 'string', 'max:190'],
            'hero_subtitle' => ['nullable', 'string', 'max:500'],
            'whatsapp' => ['nullable', 'string', 'max:40'],
            'whatsapp_display' => ['nullable', 'string', 'max:40'],
            'phone' => ['nullable', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:100'],
            'address' => ['nullable', 'string', 'max:255'],
            'working_hours' => ['nullable', 'string', 'max:100'],
            'footer_note' => ['nullable', 'string', 'max:255'],
        ]);

        foreach (array_keys(self::FIELDS) as $key) {
            WebsiteSetting::put($key, $data[$key] ?? null);
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
