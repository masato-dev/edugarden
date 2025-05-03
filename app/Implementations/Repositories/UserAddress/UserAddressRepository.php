<?php
namespace App\Implementations\Repositories\UserAddress;
use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\UserAddress\IUserAddressRepository;
use App\Models\UserAddress;
class UserAddressRepository extends BaseRepository implements IUserAddressRepository {
    public function __construct(UserAddress $model) {
        parent::__construct($model);
    }
}