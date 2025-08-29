<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id',
    ];

    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }

    public static function boot(): void {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
