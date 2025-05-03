<?php

namespace App\Http\Controllers\Ajax\Location;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\Location\ICityService;
use App\Interfaces\Services\Location\IDistrictService;
use App\Interfaces\Services\Location\IWardService;
use Illuminate\Http\Request;

class ProvinceController extends ApiController
{
    protected ICityService $cityService;
    protected IDistrictService $districtService;
    protected IWardService $wardService;
    public function __construct(ICityService $cityService, IDistrictService $districtService, IWardService $wardService) {
        $this->cityService = $cityService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    public function cities(Request $request) {
        $records = $this->cityService->getAll();
        return $this->success(__('Lấy tỉnh/thành phố thành công'), $records);
    }

    public function districts(Request $request) {
        $parentId = $request->parent_id;
        $records = $parentId 
            ? $this->districtService->getBy(['city_id' => $parentId])
            : $this->districtService->getAll();
        return $this->success(__('Lấy quận/huyện thành công'), $records);
    }

    public function wards(Request $request) {
        $parentId = $request->parent_id;
        $records = $parentId
        ? $this->wardService->getBy(['district_id' => $parentId])
        : $this->wardService->getAll();
        return $this->success(__('Lấy phường/xã thành công'), $records);
    }    
}
