<?php
namespace App\Implementations\Repositories\Location;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Location\ICityRepoository;
use App\Models\City;
class CityRepository extends BaseRepository implements ICityRepoository {
    public function __construct(City $model) {
        parent::__construct($model);
    }
}