<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $attributes = [
        'status' => 'draft',
    ];
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'status',
        'slug',
    ];

     #[BelongsTo(Category::class)
    ]
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
