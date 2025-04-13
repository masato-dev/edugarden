<?php

namespace App\View\Components\cart;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartListItem extends Component
{
    protected Cart $cart;

    /**
     * Create a new component instance.
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart.cart-list-item', [
            'cart' => $this->cart,
            'book' => $this->cart->book,
        ]);
    }
}
