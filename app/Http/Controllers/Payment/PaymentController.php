<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Core\ClientController;
use Illuminate\Http\Request;

class PaymentController extends ClientController
{
    public function result() {
        $isSuccess = session()->get('isSuccess');
        $orderId = session()->get('orderId');

        if(!isset($isSuccess)) {
            return redirect()->route('home');
        }

        return $this->getView('payment.result', [
            'isSuccess' => $isSuccess ?? true,
            'orderId' => $orderId,
        ]);        
    }
}
