<?php
namespace App\Implementations\Repositories\Account;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Account\IUserRepository;
use App\Models\User;
class UserRepository extends BaseRepository implements IUserRepository {
    public function __construct(User $model) {
        parent::__construct($model);
    }
}