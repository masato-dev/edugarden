<?php

namespace App\Http\Controllers\Client\Order;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Order\IOrderItemService;
use App\Interfaces\Services\Order\IOrderService;
use App\Interfaces\Services\UserAddress\IUserAddressService;
use App\Models\Book;
use Illuminate\Http\Request;

class OrderController extends ClientController
{
    protected IOrderService $orderService;
    protected IOrderItemService $orderItemService;
    protected IUserAddressService $userAddressService;

    public function __construct(IOrderService $orderService, IOrderItemService $orderItemService, IUserAddressService $userAddressService) {
        $this->orderService = $orderService;
        $this->orderItemService = $orderItemService;
        $this->userAddressService = $userAddressService;
    }

    public function index(Request $request) {
        $user = auth('user:web')->user();
        $userAddresses = $this->userAddressService->getBy(['user_id' => $user->id]);
        $orderItems = session()->get('order_items');
        $total = array_reduce($orderItems, function ($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        });

        return $this->getView('order.index', [
            'orderItems' => $orderItems,
            'userAddresses' => $userAddresses,
            'total' => $total,
        ]);
    }

    public function process(Request $request) {
        $bookIds = $request->book_ids;
        $books = $request->books;
        $quantities = $request->quantities;
        $prices = $request->prices;
        $orderItems = [];
        for($i = 0; $i < count($bookIds); $i++) {
            $orderItems[] = [
                'book_id' => $bookIds[$i],
                'book' => json_decode($books[$i]),
                'quantity' => $quantities[$i],
                'price' => $prices[$i],
            ];
        }
        session()->put('order_items', $orderItems);
        return redirect()->route('orders.index');
    }

}
