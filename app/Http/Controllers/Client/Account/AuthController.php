<?php

namespace App\Http\Controllers\Client\Account;

use App\Enums\AlertTypes;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Account\IUserService;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Log;

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
        $email = $request->email;
        $user = $this->userService->getBy(['email' => $email])->first();
        if($user)
            return $this->redirectBackWithMessage(__('Email đã tồn tại trong hệ thống'), AlertTypes::$error);
        try {
            $user = $this->userService->create($request->all());
            if($user)
                return $this->redirectBackWithMessage(__('Đăng ký tài khoản thành công'), AlertTypes::$success);
            else
                return $this->redirectBackWithMessage(__('Đăng ký tài khoản thất bại'), AlertTypes::$error);
        }
        catch (Exception $e) {
            Log::error($e->getTraceAsString());
            return $this->redirectBackWithMessage($e->getMessage(), AlertTypes::$error);
        }
    }

    public function logout(Request $request) {
        $user = auth('user:web')->user();
        if($user) {
            auth('user:web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return $this->redirectBackWithMessage(__('Đăng xuất thành công'), AlertTypes::$success);
        }
        return redirect()->back();
    }

    public function resetPassword(Request $request) {
        $user = auth('user:web')->user();
        if($user) {
            $oldPassword = $request->old_password;
            $password = $request->password;
            $passwordConfirmation = $request->password_confirmation;
            if($password != $passwordConfirmation)
                return $this->redirectBackWithMessage(__('Nhập lại mật khẩu chưa khớp'), AlertTypes::$error);
            if(!Hash::check($oldPassword, $user->password))
                return $this->redirectBackWithMessage(__('Mật khẩu cũ chưa hợp lệ'), AlertTypes::$error);

            $this->userService->update($user->id, ['password' => $password]);
            return $this->redirectBackWithMessage(__('Đổi mật khóa thành công'), AlertTypes::$success);
        }
    }
}
