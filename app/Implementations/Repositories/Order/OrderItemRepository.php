<?php
namespace App\Implementations\Repositories\Order;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Order\IOrderItemRepository;
use App\Models\OrderItem;
class OrderItemRepository extends BaseRepository implements IOrderItemRepository {
    public function __construct(OrderItem $model) {
        parent::__construct($model);
    }
}