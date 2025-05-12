<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Interfaces\Services\Location\ICityService;
use App\Interfaces\Services\Location\IDistrictService;
use App\Interfaces\Services\Location\IWardService;
use Log;

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
        'is_default',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    private static function defaultAddressHandler($model) {
        $count = UserAddress::where('user_id', $model->user_id)->count();
        if ($count == 1) {
            $model->is_default = 1;
        }

        else {
            $isDefault = $model->is_default;
            if ($isDefault) {
                $records = UserAddress::where('user_id', $model->user_id)->where('id', '!=', $model->id)->get();
                if(!empty($records)) {
                    foreach ($records as $record) {
                        $record->is_default = 0;
                        $record->saveQuietly();
                    }
                }
            }
        }
    }

    private static function locationHandler($model) {
        $cityService = app(ICityService::class);
        $districtService = app(IDistrictService::class);
        $wardService = app(IWardService::class);
        
        $city = $cityService->getById($model->city_id);
        $district = $districtService->getById($model->district_id);
        $ward = $wardService->getById($model->ward_id);

        $model->city_name = $city->name;
        $model->district_name = $district->name;
        $model->ward_name = $ward->name;

        $model->saveQuietly();
    }

    public static function boot() {
        parent::boot();

        static::created(function ($model) {
            self::defaultAddressHandler($model);
            self::locationHandler($model);
        });

        static::updated(function ($model) {
            self::defaultAddressHandler($model);
            self::locationHandler($model);
        });
    }
}
