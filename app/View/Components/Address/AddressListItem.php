<?php

namespace App\View\Components\Address;

use App\Models\UserAddress;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddressListItem extends Component
{
    /**
     * Create a new component instance.
     */
    protected UserAddress $address;
    public function __construct(UserAddress $address)
    {
        $this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address.address-list-item', [
            'address' => $this->address,
        ]);
    }
}
