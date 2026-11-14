<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('PT. Solusi Koneksi Anda');
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('established_year')->nullable();
            $table->text('description')->nullable();
            $table->longText('history')->nullable();
            $table->text('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->text('commitment')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('map_url')->nullable();
            $table->unsignedInteger('experience_years')->default(0);
            $table->unsignedInteger('project_count')->default(0);
            $table->unsignedInteger('client_count')->default(0);
            $table->unsignedInteger('team_count')->default(0);
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
