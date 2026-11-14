<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'ordering',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'ordering' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (ProductCategory $category) {
            $base = Str::slug($category->name) ?: 'category';

            $category->slug = static::query()
                ->where('slug', 'like', $base.'%')
                ->where('id', '!=', $category->id)
                ->exists()
                    ? $base.'-'.Str::lower(Str::random(4))
                    : $base;
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
