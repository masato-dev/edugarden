<?php

namespace App\Http\Controllers\Client\Account;

use App\Enums\AlertTypes;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Account\IUserService;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;

class AccountController extends ClientController
{
    protected IUserService $userService;
    protected Authenticatable|User $user;
    public function __construct(IUserService $userService) {
        $this->userService = $userService;
        $this->user = auth('user:web')->user();
    }

    public function index(Request $request) {
        return $this->getView('account.index', [
            'user' => $this->user
        ]);
    }

    public function update(Request $request) {
        $record = $this->userService->update($this->user->id, $request->all());
        if($record)
            return $this->redirectBackWithMessage(__('Cập nhật tài khoản thành công'), AlertTypes::$success);
        else return $this->redirectBackWithMessage(__('Cập nhật tài khoản thất bại'), AlertTypes::$error);
    }

    public function verify(Request $request) {
        return $this->getView('account.verify', [
            'user' => $this->user
        ]);
    }
}
