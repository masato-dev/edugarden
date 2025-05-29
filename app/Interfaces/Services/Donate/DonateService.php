<?php
namespace App\Interfaces\Services\Donate;

use App\Implementations\Repositories\Donate\IDonateRepository;
use App\Implementations\Services\BaseService;
use App\Implementations\Services\Donate\IDonateService;
class DonateService extends BaseService implements IDonateService {
    public function __construct(IDonateRepository $repository) {
        parent::__construct($repository);
    }
}