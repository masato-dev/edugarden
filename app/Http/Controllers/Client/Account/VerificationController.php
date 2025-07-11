<?php

namespace App\Http\Controllers\Client\Account;

use App\Enums\AlertTypes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Account\IUserService;
use App\Jobs\SendEmailVerificationJob;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use URL;

class VerificationController extends ClientController
{
    protected IUserService $userService;
    public function __construct(IUserService $userService) {
        $this->userService = $userService;
    }
    public function sendEmailVerification(Request $request) {
        $email = $request->email;
        $user = $this->userService->getBy(['email' => $email])->first();
        if(!$user) {
            return $this->redirectBackWithMessage(__('Email không tồn tại trong hệ thống'), AlertTypes::$error);
        }

        if($user instanceof MustVerifyEmail) {
            dispatch(new SendEmailVerificationJob($user));
            return $this->redirectBackWithMessage(__('Chúng tôi đã gửi email xác thực, vui lòng kiểm tra email!!'), AlertTypes::$success);
        }

        return $this->redirectBackWithMessage(__('Đã có lỗi xảy ra'), AlertTypes::$error);
    }

    public function verify(Request $request) {
        $id = $request->id;

        $user = $this->userService->getById($id);

        if($user instanceof MustVerifyEmail) {
            $user->markEmailAsVerified();
            return $this->redirectToWithMessage('home', __('Xác thực email thành công'), AlertTypes::$success);
        }

        return $this->redirectToWithMessage('home', __('Xác thực email thất bại'), AlertTypes::$error);
        
    }
}
