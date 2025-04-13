<?php
namespace App\Interfaces\Services\Cart;

use App\Interfaces\Services\IService;

interface ICartService extends IService {
    public function amount(): int;
    public function total(): int;
}