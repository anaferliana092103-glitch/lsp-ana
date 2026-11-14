<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            ['title' => 'Instalasi CCTV Rumah Minimalis', 'category' => 'Rumah', 'image' => 'images/gallery/galeri-1.svg', 'description' => 'Pemasangan 4 kamera dome dan 1 bullet untuk rumah dua lantai di Sleman.', 'ordering' => 1],
            ['title' => 'Pemasangan CCTV Toko Kelontong', 'category' => 'Toko', 'image' => 'images/gallery/galeri-2.svg', 'description' => 'Sistem 6 channel dengan DVR 8CH untuk memantau kasir dan area gudang.', 'ordering' => 2],
            ['title' => 'CCTV Koridor dan Gerbang Sekolah', 'category' => 'Sekolah', 'image' => 'images/gallery/galeri-3.svg', 'description' => '12 kamera terpasang di gerbang, koridor, dan lapangan olahraga.', 'ordering' => 3],
            ['title' => 'Instalasi Kabel Terpusat Kantor', 'category' => 'Kantor', 'image' => 'images/gallery/galeri-4.svg', 'description' => 'Pengkabelan rapi menuju ruang server dengan patch panel terorganisir.', 'ordering' => 4],
            ['title' => 'Konfigurasi Monitoring via Smartphone', 'category' => 'Monitoring', 'image' => 'images/gallery/galeri-5.svg', 'description' => 'Pelatihan pemilik usaha menggunakan aplikasi live view di HP.', 'ordering' => 5],
            ['title' => 'Upgrade Sistem CCTV Gudang', 'category' => 'Industri', 'image' => 'images/gallery/galeri-6.svg', 'description' => 'Migrasi dari sistem analog lama ke NVR 16 channel resolusi tinggi.', 'ordering' => 6],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(['title' => $gallery['title']], $gallery);
        }
    }
}
