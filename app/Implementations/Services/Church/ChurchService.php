<?php
namespace App\Implementations\Services\Church;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Church\IChurchRepository;
use App\Interfaces\Services\Church\IChurchService;
class ChurchService extends BaseService implements IChurchService {
    public function __construct(IChurchRepository $repository) {
        parent::__construct($repository);
    }
}