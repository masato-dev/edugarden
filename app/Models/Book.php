<?php

namespace App\Models;

use App\Utils\StringUtil;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'price',
        'rating',
        'buy_quantity',
    ];

    protected static function boot() {
        parent::boot();

        function genSlug($model) {
            $slug = StringUtil::toSlug($model->title);
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
