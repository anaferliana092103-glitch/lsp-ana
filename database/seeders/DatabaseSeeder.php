<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            WebsiteSettingSeeder::class,
            CompanyProfileSeeder::class,
            ServiceSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ArticleSeeder::class,
            GallerySeeder::class,
            CustomerMessageSeeder::class,
        ]);

        WebsiteSetting::flushCache();
        CompanyProfile::flushCache();
    }
}
