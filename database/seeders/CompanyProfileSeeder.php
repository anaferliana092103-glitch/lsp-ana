<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(['name' => 'PT. Koneksi Net Nusantara'], [
            'tagline' => 'Solusi Keamanan & Teknologi Terpercaya',
            'logo' => 'images/logo.svg',
            'established_year' => '2015',
            'description' => 'PT. Koneksi Net Nusantara adalah perusahaan yang bergerak di bidang teknologi dan keamanan dengan fokus utama pada jasa instalasi CCTV. Kami menghadirkan solusi pengawasan modern untuk rumah, sekolah, toko, kantor, hingga kawasan industri dengan perangkat berkualitas dan tim teknis berpengalaman.',
            'history' => "PT. Koneksi Net Nusantara berdiri pada tahun 2015 di Yogyakarta dengan tekad menghadirkan layanan keamanan berbasis teknologi yang mudah diakses oleh siapa pun.\n\nBerawal dari jasa pemasangan CCTV untuk rumah tinggal dan toko kecil, kami terus berkembang mengikuti perkembangan teknologi pengawasan digital. Seiring waktu, kami memperluas layanan mencakup instalasi sistem CCTV untuk sekolah, perkantoran, gudang, hingga kawasan industri, serta konfigurasi monitoring jarak jauh melalui smartphone.\n\nHingga saat ini kami telah menangani ratusan proyek instalasi dan senantiasa menjaga kualitas melalui tim teknis bersertifikat, produk original, serta layanan purna jual yang responsif.",
            'vision' => 'Menjadi perusahaan teknologi keamanan terpercaya di Indonesia yang menghadirkan sistem CCTV dan jaringan andal untuk melindungi setiap aset penting pelanggan.',
            'mission' => "1. Memberikan solusi keamanan yang sesuai dengan kebutuhan dan anggaran pelanggan.\n2. Memasang perangkat CCTV berkualitas dengan standar pemasangan rapi dan aman.\n3. Mengutamakan layanan pelanggan yang cepat, jujur, dan transparan.\n4. Mengembangkan kemampuan tim agar selalu mengikuti teknologi terbaru.\n5. Menjaga kepercayaan pelanggan melalui layanan purna jual yang konsisten.",
            'commitment' => 'Kami berkomitmen menjaga keamanan pelanggan melalui survei lokasi yang cermat, rekomendasi perangkat yang jujur, pemasangan rapi, pelatihan penggunaan, serta garansi dan dukungan teknis setelah instalasi. Bagi kami, keamanan bukan sekadar perangkat, melainkan kepastian bahwa pelanggan merasa tenang setiap saat.',
            'address' => 'Jl. Kesehatan Raya No. 21, Caturtunggal, Depok, Sleman, D.I. Yogyakarta 55281',
            'phone' => '0274-889-9001',
            'whatsapp' => '6281234567890',
            'email' => 'info@solusikoneksi.co.id',
            'working_hours' => 'Senin - Sabtu, 08.00 - 17.00 WIB',
            'map_url' => 'https://maps.google.com/?q=Depok+Sleman+Yogyakarta',
            'experience_years' => 9,
            'project_count' => 480,
            'client_count' => 320,
            'team_count' => 24,
            'facebook' => 'https://facebook.com/solusikoneksi',
            'instagram' => 'https://instagram.com/solusikoneksi',
            'youtube' => 'https://youtube.com/@solusikoneksi',
            'tiktok' => 'https://tiktok.com/@solusikoneksi',
            'linkedin' => 'https://linkedin.com/company/solusikoneksi',
        ]);
    }
}
