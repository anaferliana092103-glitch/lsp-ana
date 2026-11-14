<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'name', 'slug', 'icon', 'image', 'short_description', 'description',
        'features', 'is_featured', 'is_active', 'ordering',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'ordering' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Service $service) {
            $base = Str::slug($service->name) ?: 'service';

            $service->slug = static::query()
                ->where('slug', 'like', $base.'%')
                ->where('id', '!=', $service->id)
                ->exists()
                    ? $base.'-'.Str::lower(Str::random(4))
                    : $base;
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @return array<int, string>
     */
    public function featureList(): array
    {
        if (! $this->features) {
            return [];
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->features))));
    }
}
