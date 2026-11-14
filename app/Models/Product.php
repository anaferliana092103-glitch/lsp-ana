<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    public const CATEGORIES = [
        'CCTV Indoor',
        'CCTV Outdoor',
        'CCTV Wireless',
        'CCTV Dome',
        'CCTV Bullet',
        'DVR / NVR',
        'Hard Disk CCTV',
        'Kabel dan Aksesoris',
    ];

    protected $fillable = [
        'product_category_id', 'name', 'slug', 'brand', 'category', 'image', 'description',
        'specifications', 'price', 'is_active', 'is_featured', 'ordering',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'ordering' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            $base = Str::slug($product->name) ?: 'product';

            $product->slug = static::query()
                ->where('slug', 'like', $base.'%')
                ->where('id', '!=', $product->id)
                ->exists()
                    ? $base.'-'.Str::lower(Str::random(4))
                    : $base;
        });
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
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
    public function specList(): array
    {
        if (! $this->specifications) {
            return [];
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->specifications))));
    }

    public function priceLabel(): string
    {
        return $this->price ?: 'Hubungi Kami';
    }

    public function formattedPrice(): ?string
    {
        if ($this->price === null || trim((string) $this->price) === '') {
            return null;
        }

        $value = trim((string) $this->price);
        $value = preg_replace('/[^0-9,.-]/', '', $value) ?? '';

        // Harga lama dapat tersimpan sebagai "Rp 150.000" atau "150000".
        if (str_contains($value, ',')) {
            $value = str_replace('.', '', $value);
            $value = str_replace(',', '.', $value);
        } else {
            $value = str_replace('.', '', $value);
        }

        if (! is_numeric($value)) {
            return null;
        }

        return 'Rp ' . number_format((float) $value, 0, ',', '.');
    }
}
