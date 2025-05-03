<?php
namespace App\Implementations\Services\Location;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Location\IWardRepository;
use App\Interfaces\Services\Location\IWardService;
class WardService extends BaseService implements IWardService {
    public function __construct(IWardRepository $repository) {
        parent::__construct($repository);
    }
}