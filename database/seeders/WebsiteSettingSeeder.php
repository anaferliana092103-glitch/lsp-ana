<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'PT. Koneksi Net Nusantara',
            'site_tagline' => 'Solusi Keamanan & Teknologi',
            'site_description' => 'Jasa instalasi CCTV rumah, toko, kantor, dan sekolah. Monitoring online via HP, maintenance, dan produk CCTV berkualitas.',
            'whatsapp' => '6281234567890',
            'whatsapp_display' => '+62 812-3456-7890',
            'phone' => '0274-889-9001',
            'email' => 'info@solusikoneksi.co.id',
            'address' => 'Jl. Kesehatan Raya No. 21, Caturtunggal, Depok, Sleman, D.I. Yogyakarta 55281',
            'working_hours' => 'Senin - Sabtu, 08.00 - 17.00 WIB',
            'hero_title' => 'Solusi Keamanan Terpercaya untuk Rumah dan Bisnis Anda',
            'hero_subtitle' => 'PT. Solusi Koneksi Anda menyediakan jasa instalasi CCTV, monitoring online, dan maintenance profesional untuk melindungi aset penting Anda.',
            'footer_note' => 'Menyediakan solusi CCTV dan sistem keamanan profesional sejak 2015.',
        ];

        foreach ($settings as $key => $value) {
            WebsiteSetting::put($key, $value);
        }
    }
}
