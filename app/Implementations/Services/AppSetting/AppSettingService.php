<?php
namespace App\Implementations\Services\AppSetting;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\AppSetting\IAppSettingRepository;
use App\Interfaces\Services\AppSetting\IAppSettingService;
class AppSettingService extends BaseService implements IAppSettingService {
    public function __construct(IAppSettingRepository $repository) {
        parent::__construct($repository);
    }
}