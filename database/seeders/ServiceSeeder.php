<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Instalasi CCTV Rumah',
                'icon' => 'bi-house-door',
                'image' => 'images/services/cctv-rumah.svg',
                'short_description' => 'Pemasangan kamera CCTV untuk meningkatkan keamanan rumah dan lingkungan sekitar.',
                'description' => 'Kami memasang sistem CCTV rumah yang mudah digunakan, mulai dari 2 hingga 16 kamera sesuai kebutuhan ruangan. Setiap unit dipasang pada titik strategis seperti pintu utama, area parkir, dan halaman belakang agar tidak ada area blind spot. Anda dapat memantau rumah secara langsung melalui HP kapan pun, baik saat berada di kantor maupun saat bepergian.',
                'features' => "Survei lokasi dan rekomendasi titik pemasangan\nKamera indoor dan outdoor resolusi 2MP - 5MP\nRekaman jelas siang dan malam (infrared)\nAkses live view melalui smartphone\nGaransi perangkat dan jasa pemasangan",
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 1,
            ],
            [
                'name' => 'Instalasi CCTV Toko dan Kantor',
                'icon' => 'bi-building',
                'image' => 'images/services/cctv-toko.svg',
                'short_description' => 'Pemasangan sistem CCTV untuk memantau aktivitas bisnis dan menjaga keamanan tempat usaha.',
                'description' => 'Sistem pengawasan untuk toko, kantor, restoran, dan kawasan komersial lainnya. Kami membantu memetakan area rawan seperti kasir, gudang, dan pintu masuk, kemudian memasang kamera dengan rekaman terpusat menggunakan DVR/NVR. Laporan rekaman dapat dijadikan bukti bila terjadi kehilangan atau kejadian yang tidak diinginkan.',
                'features' => "Pemetaan area rawan dan titik strategis\nDVR/NVR multi channel dengan kapasitas besar\nRekaman terpusat untuk banyak kamera\nAkses rekaman jarak jauh untuk manajemen\nKonsultasi kapasitas penyimpanan data",
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 2,
            ],
            [
                'name' => 'Instalasi CCTV Sekolah',
                'icon' => 'bi-bank',
                'image' => 'images/services/cctv-sekolah.svg',
                'short_description' => 'Penyediaan sistem pengawasan untuk membantu meningkatkan keamanan lingkungan sekolah.',
                'description' => 'Kami membantu sekolah memasang sistem pengawasan di area gerbang, koridor, kelas, lapangan, hingga kantin. Sistem ini memudahkan pihak sekolah dalam mengawasi aktivitas siswa, menjaga aset sekolah, serta memberikan rasa aman bagi orang tua. Tenaga teknis kami bekerja di luar jam pelajaran agar tidak mengganggu kegiatan belajar mengajar.',
                'features' => "Pemasangan di gerbang, koridor, dan area publik\nKamera resolusi tinggi untuk identifikasi wajah\nPenyimpanan rekaman 30 hari atau lebih\nPemasangan tanpa mengganggu jam pelajaran\nPelatihan operator sekolah",
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 3,
            ],
            [
                'name' => 'CCTV Online dan Monitoring HP',
                'icon' => 'bi-phone',
                'image' => 'images/services/cctv-online.svg',
                'short_description' => 'Konfigurasi CCTV agar pelanggan dapat memantau kamera melalui smartphone.',
                'description' => 'Kami mengonfigurasi jaringan dan aplikasi agar seluruh kamera Anda dapat diakses secara online dari mana saja menggunakan HP, tablet, atau PC. Layanan ini mencakup pengaturan akun, mode push notifikasi saat mendeteksi gerakan, hingga berbagi akses kepada anggota keluarga atau rekan kerja.',
                'features' => "Konfigurasi aplikasi mobile iOS dan Android\nLive view dan playback dari jarak jauh\nNotifikasi motion detection ke HP\nBerbagi akses monitoring ke banyak pengguna\nOptimasi koneksi jaringan rumah atau kantor",
                'is_featured' => true,
                'is_active' => true,
                'ordering' => 4,
            ],
            [
                'name' => 'Maintenance dan Perbaikan CCTV',
                'icon' => 'bi-tools',
                'image' => 'images/services/maintenance.svg',
                'short_description' => 'Pemeriksaan, perawatan, dan perbaikan sistem CCTV agar tetap berfungsi dengan baik.',
                'description' => 'Layanan perawatan berkala meliputi pembersihan lensa kamera, pengecekan kabel dan konektor, update firmware, penggantian hard disk yang mulai lemah, hingga perbaikan kamera yang mati total. Kami juga melayani perbaikan sistem CCTV lama yang ingin di-upgrade tanpa harus mengganti seluruh perangkat.',
                'features' => "Pemeriksaan dan pembersihan kamera berkala\nDeteksi dini kerusakan kabel dan power supply\nPenggantian hard disk CCTV\nPerbaikan kamera dan DVR/NVR\nPaket kontrak maintenance bulanan",
                'is_featured' => false,
                'is_active' => true,
                'ordering' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => \Illuminate\Support\Str::slug($service['name'])], $service);
        }
    }
}
