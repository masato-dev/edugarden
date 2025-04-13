<?php
namespace App\Implementations\Services\Cart;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Cart\ICartRepository;
use App\Interfaces\Services\Cart\ICartService;

class CartService extends BaseService implements ICartService {

    protected ICartRepository $cartRepository;
    public function __construct(ICartRepository $repository) {
        parent::__construct($repository);
        $this->cartRepository = $repository;
    }

    public function amount(): int {
        return $this->cartRepository->amount();
    }

    public function total(): int {
        return $this->cartRepository->total();
    }
}