<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'author', 'image', 'excerpt',
        'content', 'published_at', 'is_published', 'views',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'is_published' => 'boolean',
            'views' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            $base = Str::slug($article->title) ?: 'artikel';

            $article->slug = static::query()
                ->where('slug', 'like', $base.'%')
                ->where('id', '!=', $article->id)
                ->exists()
                    ? $base.'-'.Str::lower(Str::random(4))
                    : $base;

            if (! $article->published_at) {
                $article->published_at = now()->toDateString();
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where(fn ($q) => $q->whereNull('published_at')->orWhere('published_at', '<=', today()));
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function readingTime(): int
    {
        $words = str_word_count(strip_tags((string) $this->content));

        return max(1, (int) ceil($words / 200));
    }
}
