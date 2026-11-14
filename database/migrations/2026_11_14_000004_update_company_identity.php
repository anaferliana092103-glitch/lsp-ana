<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('website_settings')
            ->where('key', 'site_name')
            ->where('value', 'PT. Solusi Koneksi Anda')
            ->update(['value' => 'PT. Koneksi Net Nusantara']);

        DB::table('company_profiles')
            ->where('name', 'PT. Solusi Koneksi Anda')
            ->update(['name' => 'PT. Koneksi Net Nusantara']);
    }

    public function down(): void
    {
        DB::table('website_settings')
            ->where('key', 'site_name')
            ->where('value', 'PT. Koneksi Net Nusantara')
            ->update(['value' => 'PT. Solusi Koneksi Anda']);

        DB::table('company_profiles')
            ->where('name', 'PT. Koneksi Net Nusantara')
            ->update(['name' => 'PT. Solusi Koneksi Anda']);
    }
};
