<?php

namespace App\Http\Controllers\Ajax\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Utils\StringUtil;
use Illuminate\Http\Request;

class VietQRPaymentController extends ApiController {
    public function qrCode(Request $request) {
        $amount = $request->amount;
        $note = $request->note;
        $url = StringUtil::createVietQRImageUrl($amount, $note);
        if($url)
            return $this->success(__("Tạo mã QR thành công"), $url);
        return $this->error(__("Tạo má QR thất bại"));
    }
}
