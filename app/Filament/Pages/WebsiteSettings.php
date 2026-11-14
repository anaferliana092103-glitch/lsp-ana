<?php

namespace App\Filament\Pages;

use App\Models\WebsiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class WebsiteSettings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Web';
    protected static ?string $title = 'Pengaturan Web';
    protected static ?string $slug = 'pengaturan-web';
    protected string $view = 'filament.pages.website-settings';

    public string $site_name = '';
    public string $logo = '';
    public string $address = '';
    public string $phone = '';
    public string $email = '';
    public string $site_description = '';
    public string $whatsapp = '';

    public function mount(): void
    {
        $settings = WebsiteSetting::asArray();
        foreach (['site_name', 'logo', 'address', 'phone', 'email', 'site_description', 'whatsapp'] as $key) {
            $this->{$key} = (string) ($settings[$key] ?? '');
        }
    }

    public function save(): void
    {
        $this->validate([
            'site_name' => ['nullable', 'string', 'max:150'],
            'logo' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:100'],
            'site_description' => ['nullable', 'string', 'max:500'],
            'whatsapp' => ['nullable', 'string', 'max:40'],
        ]);

        foreach (['site_name', 'logo', 'address', 'phone', 'email', 'site_description', 'whatsapp'] as $key) {
            WebsiteSetting::put($key, $this->{$key});
        }

        Notification::make()->title('Pengaturan berhasil disimpan.')->success()->send(); 
    }
}

