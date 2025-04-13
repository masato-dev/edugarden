<?php
namespace App\Implementations\Repositories\Cart;

use App\Implementations\Repositories\BaseRepository;
use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Cart\ICartRepository;
use App\Models\Cart;

class CartRepository extends BaseRepository implements ICartRepository {
    public function __construct(Cart $model) {
        parent::__construct($model);
    }

    public function amount(): int {
        $result = 0;
        $user = auth('user:web')->user();
        $records = $this->getBy(['user_id' => $user->id]);
        if(!empty($records)) {
            $result = array_reduce($records->toArray(), fn ($acc, $curr) => $acc + $curr['quantity'], 0);
        }
        return $result;
    }

    public function total(): int {
        $result = 0;
        $user = auth('user:web')->user();
        $records = $this->getBy(['user_id' => $user->id]);
        foreach($records as $record) {
            $result += $record->quantity * $record->book->price;
        }
        return $result;
    }
}