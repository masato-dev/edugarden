<?php

namespace App\View\Components\Address;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddressListingModal extends Component
{
    /**
     * Create a new component instance.
     */
    private mixed $addresses;
    public function __construct(mixed $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address.address-listing-modal', [
            'addresses' => $this->addresses,
        ]);
    }
}
