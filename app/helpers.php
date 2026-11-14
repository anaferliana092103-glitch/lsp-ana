<?php

use App\Models\CompanyProfile;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('image_url')) {
    function image_url(?string $path, ?string $fallback = 'images/placeholder.svg'): string
    {
        if (! $path) {
            return asset($fallback);
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        $path = ltrim($path, '/');

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        if (Str::startsWith($path, 'images/')) {
            return asset($path);
        }

        // FileUpload pada disk public menyimpan path relatif seperti gallery/foto.jpg.
        // Semua path database tersebut harus melalui public/storage.
        return Storage::disk('public')->url($path);
    }
}

if (! function_exists('company_logo_url')) {
    function company_logo_url(?string $path = null): string
    {
        // Gunakan logo publik yang benar-benar ada. Path lama seperti images/logo.svg
        // tidak dipakai jika file tersebut tidak tersedia.
        $fallback = 'images/logo.png';
        $path = ltrim((string) ($path ?: ''), '/');

        if ($path === '' || ($path === 'images/logo.svg' && ! file_exists(public_path($path)))) {
            return asset($fallback);
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, 'images/') && file_exists(public_path($path))) {
            return asset($path);
        }

        if (file_exists(storage_path('app/public/'.$path))) {
            return Storage::disk('public')->url($path);
        }

        return asset($fallback);
    }
}

if (! function_exists('setting')) {
    function setting(?string $key, ?string $default = null): ?string
    {
        return WebsiteSetting::get($key, $default);
    }
}

if (! function_exists('company_profile')) {
    function company_profile(): CompanyProfile
    {
        return CompanyProfile::current();
    }
}

if (! function_exists('wa_link')) {
    function wa_link(?string $number, string $text = ''): string
    {
        $number = preg_replace('/\D/', '', (string) $number);

        $url = 'https://wa.me/'.$number;

        if ($text !== '') {
            $url .= '?text='.urlencode($text);
        }

        return $url;
    }
}
