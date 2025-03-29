<?php
namespace App\Implementations\Repositories\Church;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Cache\Behaviour\ShouldCache;
use App\Interfaces\Repositories\Church\IChurchRepository;
use App\Models\Church;
class ChurchRepository extends BaseRepository implements IChurchRepository, ShouldCache {
    public function __construct(Church $model) {
        parent::__construct($model);
    }
}