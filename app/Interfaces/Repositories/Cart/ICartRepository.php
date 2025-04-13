<?php
namespace App\Interfaces\Repositories\Cart;

use App\Interfaces\Repositories\IRepository;

interface ICartRepository extends IRepository {
    public function amount(): int;
    public function total(): int;
}