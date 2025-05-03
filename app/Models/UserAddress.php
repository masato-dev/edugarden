<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    protected $fillable = [
        'phone',
        'name',
        'city_name',
        'district_name',
        'ward_name',
        'address_detail',
        'city_id',
        'district_id',
        'ward_id',
        'user_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function boot() {
        parent::boot();

        static::created(function ($model) {
            $count = UserAddress::where('user_id', $model->user_id)->count();
            if ($count == 1) {
                $model->update(['default' => 1]);
            }
        });

        static::updated(function ($model) {
            $isDefault = $model->is_default;
            if ($isDefault) {
                UserAddress::where('user_id', $model->user_id)->where('id', '!=', $model->id)->update(['is_default' => 0]);
            }
        });
    }
}
