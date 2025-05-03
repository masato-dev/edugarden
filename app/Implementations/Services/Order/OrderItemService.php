<?php
namespace App\Implementations\Services\Order;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Order\IOrderItemRepository;
use App\Interfaces\Services\Order\IOrderItemService;
class OrderItemService extends BaseService implements IOrderItemService {
    public function __construct(IOrderItemRepository $repository) {
        parent::__construct($repository);
    }
}