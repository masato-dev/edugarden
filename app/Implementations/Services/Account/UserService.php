<?php
namespace App\Implementations\Services\Account;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Account\IUserRepository;
use App\Interfaces\Repositories\IRepository;
use App\Interfaces\Services\Account\IUserService;
class UserService extends BaseService implements IUserService {
    public function __construct(IUserRepository $repository) {
        parent::__construct($repository);
    }
}