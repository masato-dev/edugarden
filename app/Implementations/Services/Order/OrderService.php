<?php
namespace App\Implementations\Services\Order;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Order\IOrderRepository;
use App\Interfaces\Services\Order\IOrderService;
class OrderService extends BaseService implements IOrderService {
    public function __construct(IOrderRepository $repository) {
        parent::__construct($repository);
    }
}