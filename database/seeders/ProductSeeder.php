<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'CCTV Dome Indoor 2MP HiLook',
                'brand' => 'Hikvision',
                'category' => 'CCTV Dome',
                'image' => 'images/products/cctv-dome.svg',
                'description' => 'Kamera dome indoor resolusi 2MP dengan desain compact sehingga tidak mencolok di dalam ruangan. Cocok untuk kamar, ruang tamu, kasir, dan kantor kecil.',
                'specifications' => "Resolusi 2MP (1920 x 1080)\nInfrared 20 meter\nLensa 2.8mm wide angle\nDaya 5W (PoE / 12V DC)\nTahan indoor, IP20",
                'price' => 'Rp 750.000',
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 1,
            ],
            [
                'name' => 'CCTV Bullet Outdoor 4MP Dahua',
                'brand' => 'Dahua',
                'category' => 'CCTV Bullet',
                'image' => 'images/products/cctv-bullet.svg',
                'description' => 'Kamera bullet outdoor 4MP dengan housing tahan cuaca untuk area parkir, halaman, dan pagar rumah. Gambar tetap jelas meski kondisi minim cahaya.',
                'specifications' => "Resolusi 4MP (2560 x 1440)\nInfrared 40 meter\nIP67 tahan hujan dan debu\nSmart IR & WDR\nDaya 12V DC / PoE",
                'price' => 'Rp 1.350.000',
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 2,
            ],
            [
                'name' => 'CCTV Wireless Wi-Fi Cam Tapo',
                'brand' => 'TP-Link',
                'category' => 'CCTV Wireless',
                'image' => 'images/products/cctv-wireless.svg',
                'description' => 'Kamera nirkabel yang cukup terhubung ke Wi-Fi rumah tanpa perlu kabel video. Praktis untuk penyewaan kos, kamar, dan ruang usaha kecil.',
                'specifications' => "Resolusi 3MP Full HD+\nKoneksi Wi-Fi 2.4GHz\nTwo-way audio\nSlot microSD hingga 256GB\nDeteksi gerakan & notifikasi HP",
                'price' => 'Rp 450.000',
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 3,
            ],
            [
                'name' => 'CCTV Outdoor 5MP Hikvision ColorVu',
                'brand' => 'Hikvision',
                'category' => 'CCTV Outdoor',
                'image' => 'images/products/cctv-outdoor.svg',
                'description' => 'Kamera outdoor 5MP dengan teknologi warna penuh 24 jam, mampu menangkap detail wajah dan plat nomor pada malam hari tanpa gambar hitam putih.',
                'specifications' => "Resolusi 5MP (2592 x 1944)\nColorVu full color 24 jam\nSupplement light 30 meter\nIP67 outdoor\nBisa DVR/NVR 4MP ke atas",
                'price' => 'Rp 2.100.000',
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 4,
            ],
            [
                'name' => 'CCTV Indoor 3MP EZVIZ C6N',
                'brand' => 'EZVIZ',
                'category' => 'CCTV Indoor',
                'image' => 'images/products/cctv-indoor.svg',
                'description' => 'Kamera indoor 3MP dengan fitur pan tilt yang dapat diputar dari aplikasi. Ideal untuk memantau bayi, lansia, dan hewan peliharaan dari jarak jauh.',
                'specifications' => "Resolusi 1080p - 3MP\nPan 360 derajat / Tilt 110 derajat\nNight vision 10 meter\nSmart tracking & privacy mode\nKontrol penuh via aplikasi",
                'price' => 'Rp 550.000',
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 5,
            ],
            [
                'name' => 'DVR 8 Channel Hikvision TurboHD',
                'brand' => 'Hikvision',
                'category' => 'DVR / NVR',
                'image' => 'images/products/dvr.svg',
                'description' => 'Recorder 8 channel untuk menghubungkan hingga 8 kamera sekaligus, mendukung rekaman terpusat dan akses online melalui HP.',
                'specifications' => "8 channel input kamera\nOutput HDMI + VGA\nRekaman 1080p Lite\nSupport kabel coaxial BNC\nAkses online via aplikasi Hik-Connect",
                'price' => 'Rp 1.650.000',
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 6,
            ],
            [
                'name' => 'NVR 16 Channel 4K Dahua',
                'brand' => 'Dahua',
                'category' => 'DVR / NVR',
                'image' => 'images/products/nvr.svg',
                'description' => 'Recorder IP 16 channel resolusi 4K untuk sistem CCTV skala menengah seperti sekolah, pabrik, dan kantor multi lantai.',
                'specifications' => "16 channel IP camera\nInput bandwidth 160 Mbps\nOutput HDMI 4K\n2 slot SATA hingga 10TB\nPoE ready (model tertentu)",
                'price' => 'Rp 4.500.000',
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 7,
            ],
            [
                'name' => 'Hard Disk CCTV 1TB WD Purple',
                'brand' => 'Western Digital',
                'category' => 'Hard Disk CCTV',
                'image' => 'images/products/hdd.svg',
                'description' => 'Hard disk khusus CCTV yang dirancang bekerja 24/7, menjaga rekaman tetap tersimpan stabil tanpa kehilangan data.',
                'specifications' => "Kapasitas 1TB\nWorkload 180TB/tahun\nDirancang 24/7 always-on\nSilent & low power\nGaransi 2 tahun",
                'price' => 'Rp 850.000',
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 8,
            ],
            [
                'name' => 'Kabel RG59 + Power 100 Meter',
                'brand' => 'Generic',
                'category' => 'Kabel dan Aksesoris',
                'image' => 'images/products/kabel.svg',
                'description' => 'Paket kabel siap pakai untuk instalasi CCTV, sudah menyertakan jalur listrik sehingga pemasangan lebih cepat dan rapi.',
                'specifications' => "Panjang 100 meter\nKombinasi video + power\nTahan cuaca dalam ruangan\nDilengkapi connector BNC\nCocok untuk sistem analog HD",
                'price' => 'Rp 475.000',
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 9,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => \Illuminate\Support\Str::slug($product['name'])], $product);
        }
    }
}
