<?php
namespace App\Implementations\Repositories\AppSetting;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\AppSetting\IAppSettingRepository;
use App\Models\AppSetting;
class AppSettingRepository extends BaseRepository implements IAppSettingRepository {
    public function __construct(AppSetting $model) {
        parent::__construct($model);
    }    
}