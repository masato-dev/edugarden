<?php

namespace App\Livewire\Address;

use App\Interfaces\Services\UserAddress\IUserAddressService;
use App\Models\UserAddress;
use Illuminate\Auth\Authenticatable;
use Livewire\Component;
use App\Models\User;
use Log;
use stdClass;

class AddressCRUDForm extends Component
{
    public mixed $addresses;
    public UserAddress|null $chosenAddress;
    private IUserAddressService $userAddressService;
    private Authenticatable|User|null $user;

    public function getListeners(): array {
        return ['storeAddress', 'choseAddress'];
    }

    public function __construct() {
        $this->userAddressService = app()->make(IUserAddressService::class);
        $this->user = auth('user:web')->user();
        $this->addresses = $this->userAddressService->getBy(['user_id' => $this->user->id]);
        $this->chosenAddress = $this->userAddressService->getBy(['user_id' => $this->user->id, 'is_default' => 1])->first();
        if($this->chosenAddress == null) {
            $this->chosenAddress = $this->userAddressService->getBy(['user_id' => $this->user->id])->first();
        }
    }

    public function storeAddress(string $name, string $phone, string $addressDetail, int $cityId, int $districtId, int $wardId, bool $isDefault) {
        $requestData = [
            'name' => $name,
            'phone' => $phone,
            'address_detail' => $addressDetail,
            'city_id' => $cityId,
            'district_id' => $districtId,
            'ward_id' => $wardId,
            'is_default' => $isDefault,
            'user_id' => $this->user->id,
        ];
        $record = $this->userAddressService->create($requestData);
        if($record) {
            $this->chosenAddress = $record;
            $this->addresses[] = $record;
            $this->dispatch('addressStored', ['success' => true]);
        }
    }

    public function choseAddress(int $addressId) {
        foreach($this->addresses as $address) {
            if($address->id == $addressId) {
                $this->chosenAddress = $address;
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.address.address-crud-form', [
            'chosenAddress' => $this->chosenAddress,
            'addresses' => $this->addresses,
        ]);
    }
}
