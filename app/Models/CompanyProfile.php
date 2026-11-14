<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CompanyProfile extends Model
{
    protected $fillable = [
        'name', 'tagline', 'logo', 'established_year', 'description', 'history',
        'vision', 'mission', 'commitment', 'address', 'phone', 'whatsapp', 'email',
        'working_hours', 'map_url', 'experience_years', 'project_count', 'client_count',
        'team_count', 'facebook', 'instagram', 'youtube', 'tiktok', 'linkedin',
    ];

    protected function casts(): array
    {
        return [
            'experience_years' => 'integer',
            'project_count' => 'integer',
            'client_count' => 'integer',
            'team_count' => 'integer',
        ];
    }

    public static function current(): self
    {
        return Cache::remember('company_profile_current', now()->addHour(), function () {
            $profile = static::query()->first();

            if (! $profile) {
                $profile = static::create([
                    'name' => 'PT. Koneksi Net Nusantara',
                    'tagline' => 'Solusi Keamanan & Teknologi Terpercaya',
                    'established_year' => '2015',
                ]);
            }

            return $profile;
        });
    }

    public static function flushCache(): void
    {
        Cache::forget('company_profile_current');
    }

    protected static function booted(): void
    {
        static::saved(fn () => static::flushCache());
        static::deleted(fn () => static::flushCache());
    }
}
