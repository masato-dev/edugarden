<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Cart\ICartService;
use Illuminate\Http\Request;

class CartController extends ClientController
{
    protected ICartService $cartService;
    public function __construct(ICartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index(Request $request) {
        $user = auth('user:web')->user();
        $carts = $this->cartService->getBy(['user_id' => $user->id]);
        $cartAmount = $this->cartService->amount();
        $cartTotal = $this->cartService->total();
        return $this->getView('cart.index', [
            'carts' => $carts,
            'cartAmount' => $cartAmount,
            'cartTotal' => $cartTotal,
        ]);
    }
}
