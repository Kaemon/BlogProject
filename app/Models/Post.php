<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $attributes = [
        'status' => 'draft',
    ];

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'description',
        'status',
        'slug',
    ];

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    #[BelongsTo(Category::class)
    ]
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
