<?php

namespace Database\Seeders;

use App\Models\CustomerMessage;
use Illuminate\Database\Seeder;

class CustomerMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'phone' => '081223344556',
                'subject' => 'Konsultasi CCTV Rumah',
                'message' => 'Selamat siang, saya ingin memasang CCTV untuk rumah minimalis saya di area Depok Sleman. Rumah tipe 60 dengan 3 kamar. Mohon info paket dan perkiraan biayanya. Terima kasih.',
                'is_read' => false,
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@sch.id',
                'phone' => '085677889900',
                'subject' => 'Instalasi CCTV Sekolah',
                'message' => 'Kami dari pihak sekolah ingin memasang CCTV sebanyak 15 titik untuk gerbang, koridor, dan kantin. Apakah bisa pemasangan di luar jam pelajaran? Mohon penawarannya.',
                'is_read' => false,
            ],
            [
                'name' => 'Andi Wijaya',
                'email' => 'andiwijaya88@gmail.com',
                'phone' => '081355667788',
                'subject' => 'Maintenance CCTV Toko',
                'message' => 'Toko saya sudah punya CCTV 8 kamera tetapi 2 kamera tidak bisa direkam sejak seminggu lalu. Bisa dibantu untuk perbaikan dan maintenance rutin?',
                'is_read' => true,
            ],
        ];

        foreach ($messages as $message) {
            CustomerMessage::create($message);
        }
    }
}
