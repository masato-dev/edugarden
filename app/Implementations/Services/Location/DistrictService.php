<?php
namespace App\Implementations\Services\Location;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Location\IDistrictRepository;
use App\Interfaces\Services\Location\IDistrictService;
class DistrictService extends BaseService implements IDistrictService {
    public function __construct(IDistrictRepository $repository) {
        parent::__construct($repository);
    }
}