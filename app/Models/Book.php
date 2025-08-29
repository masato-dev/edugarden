<?php

namespace App\Models;

use App\Utils\StringUtil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'price',
        'rating',
        'buy_quantity',
        'short_description',
        'category_id',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    protected static function boot() {
        parent::boot();

        function genSlug($model) {
            $slug = Str::slug($model->title);
            $model->slug = $slug;
        }

        static::creating(function ($model) {
            genSlug($model);
        });

        static::updating(function ($model) {
            genSlug($model);
        });
    }
}
