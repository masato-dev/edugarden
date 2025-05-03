<?php
namespace App\Implementations\Repositories\Order;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Order\IOrderRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository implements IOrderRepository {
    public function __construct(Order $model) {
        parent::__construct($model);
    }
}