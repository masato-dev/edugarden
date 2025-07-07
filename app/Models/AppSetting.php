<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'meta_url',
        'meta_type',
        'meta_locale',
        'sections',
        'is_active',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function getSectionsAttribute($value)
    {
        $decoded = json_decode($value, true);

        if (is_array($decoded)) {
            return $decoded;
        }

        return [];
    }


    private static function toggleActive($model) {
        if($model->is_active) {
            self::where('id', '!=', $model->id)
                ->when($model->is_active, fn ($q) => $q->update(['is_active' => false]));

        }
    }

    public static function boot(): void {
        parent::boot();

        static::creating(function ($model) {
            self::toggleActive($model);
        });

        static::updating(function ($model) {
            self::toggleActive($model);
        });
    }
}
