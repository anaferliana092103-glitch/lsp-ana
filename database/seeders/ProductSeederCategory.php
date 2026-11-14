<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'CCTV Indoor', 'description' => 'Kamera CCTV untuk penggunaan di dalam ruangan', 'ordering' => 1],
            ['name' => 'CCTV Outdoor', 'description' => 'Kamera CCTV tahan cuaca untuk luar ruangan', 'ordering' => 2],
            ['name' => 'CCTV Wireless', 'description' => 'Kamera CCTV nirkabel dengan koneksi WiFi', 'ordering' => 3],
            ['name' => 'CCTV Dome', 'description' => 'Kamera CCTV berbentuk dome', 'ordering' => 4],
            ['name' => 'CCTV Bullet', 'description' => 'Kamera CCTV berbentuk bullet', 'ordering' => 5],
            ['name' => 'DVR / NVR', 'description' => 'Perangkat perekam video digital', 'ordering' => 6],
            ['name' => 'Aksesoris CCTV', 'description' => 'Kabel, bracket, adaptor, dan aksesoris lainnya', 'ordering' => 7],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                    'ordering' => $category['ordering'],
                ]
            );
        }
    }
}