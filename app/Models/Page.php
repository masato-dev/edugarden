<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    private static function genSlug($model) {
        $slug = Str::slug($model->title);
        $model->slug = $slug;
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            self::genSlug($model);
        });

        static::updating(function ($model) {
            self::genSlug($model);
        });
    }
}
