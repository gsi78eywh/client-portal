<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'badge_color',
        'published_at',
        'is_pinned',
        'read_time',
        'author',
        'summary',
        'content',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_pinned' => 'boolean',
    ];

    /**
     * Scope to filter announcements by category.
     */
    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        if (empty($category) || strtolower($category) === 'all') {
            return $query;
        }

        return $query->whereRaw('LOWER(category) = ?', [strtolower(trim($category))]);
    }

    /**
     * Scope to search announcements by title, summary, content, or category.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('summary', 'like', "%{$term}%")
                ->orWhere('content', 'like', "%{$term}%")
                ->orWhere('category', 'like', "%{$term}%");
        });
    }

    /**
     * Scope to order by pinned first, then newest publication date.
     */
    public function scopePinnedFirst(Builder $query): Builder
    {
        return $query->orderByDesc('is_pinned')->orderByDesc('published_at')->orderByDesc('id');
    }
}
