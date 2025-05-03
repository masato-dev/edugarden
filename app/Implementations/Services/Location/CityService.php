<?php
namespace App\Implementations\Services\Location;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Location\ICityRepoository;
use App\Interfaces\Services\Location\ICityService;
class CityService extends BaseService implements ICityService {
    public function __construct(ICityRepoository $repository) {
        parent::__construct($repository);
    }
}