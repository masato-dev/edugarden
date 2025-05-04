<?php

namespace App\Http\Controllers\Ajax\UserAddress;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\UserAddress\IUserAddressService;
use App\Models\User;
use App\Trait\CrudBehaviour;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;

class UserAddressController extends ApiController
{
    use CrudBehaviour;
    protected IUserAddressService $userAddressService;
    protected Authenticatable|null $user;
    public function __construct(IUserAddressService $userAddressService) {
        $this->userAddressService = $userAddressService;
        $this->user = auth('user:web')->user();
    }

    public function store(Request $request) {
        return $this->_store(
            $request, 
            $this->userAddressService,
            ['user_id' => $this->user->id],
            true,
        );
    }

    public function update(Request $request) {
        return $this->_update(
            $request, 
            $this->userAddressService,
            ['user_id' => $this->user->id],
            true,
        );
    }

    public function delete(Request $request) {
        return $this->_delete($request, $this->userAddressService);
    }
}
