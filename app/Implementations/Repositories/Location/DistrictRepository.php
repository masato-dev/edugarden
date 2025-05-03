<?php
namespace App\Implementations\Repositories\Location;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Location\IDistrictRepository;
use App\Models\District;
class DistrictRepository extends BaseRepository implements IDistrictRepository {
    public function __construct(District $model) {
        parent::__construct($model);
    }
}