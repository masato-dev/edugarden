<?php

namespace App\Http\Controllers\Client\Account;

use App\Enums\AlertTypes;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Account\IUserService;
use Illuminate\Http\Request;

class AuthController extends ClientController
{
    protected IUserService $userService;

    public function __construct(IUserService $userService) {
        $this->userService = $userService;
    }

    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->remember == 'on';
        if(empty($credentials))
            return $this->redirectBackWithMessage(__('Vui lòng nhập đầy đủ thông tin đăng nhập'), AlertTypes::$error);
        
        if(!auth('user:web')->attempt($credentials, $remember)) {
            return $this->redirectBackWithMessage(__('Thông tin đăng nhập sai'), AlertTypes::$error);
        }

        return $this->redirectBackWithMessage(__('Đăng nhập thành công'));
    }

    public function register(Request $request) {
        
    }
}
