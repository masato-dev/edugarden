<?php
namespace App\Implementations\Services\UserAddress;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\UserAddress\IUserAddressRepository;
use App\Interfaces\Services\UserAddress\IUserAddressService;
class UserAddressService extends BaseService implements IUserAddressService {
    public function __construct(IUserAddressRepository $repository) {
        parent::__construct($repository);
    }
}