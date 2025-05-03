<?php
namespace App\Implementations\Repositories\Location;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Location\IWardRepository;
use App\Models\Ward;
class WardRepository extends BaseRepository implements IWardRepository {
    public function __construct(Ward $model) {
        parent::__construct($model);
    }
}