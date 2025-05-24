<?php

namespace App\Http\Controllers\Client\Order;

use App\Enums\AlertTypes;
use App\Enums\DeliveryStatuses;
use App\Enums\PaymentStatuses;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Cart\ICartService;
use App\Interfaces\Services\Order\IOrderItemService;
use App\Interfaces\Services\Order\IOrderService;
use App\Interfaces\Services\UserAddress\IUserAddressService;
use App\Models\Book;
use DB;
use Exception;
use Illuminate\Http\Request;
use Log;

class OrderController extends ClientController
{
    protected IOrderService $orderService;
    protected IOrderItemService $orderItemService;
    protected IUserAddressService $userAddressService;
    protected ICartService $cartService;

    public function __construct(IOrderService $orderService, IOrderItemService $orderItemService, IUserAddressService $userAddressService, ICartService $cartService) {
        $this->orderService = $orderService;
        $this->orderItemService = $orderItemService;
        $this->userAddressService = $userAddressService;
        $this->cartService = $cartService;
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

    public function pay(Request $request) {
        $user = auth('user:web')->user();
        $orderItems = session()->get('order_items');
        $userAddressId = intval($request->chosen_address_id);
        $paymentMethod = intval(session()->get('payment_method'));
        try {
            DB::beginTransaction();
            $order = $this->orderService->create([
                'payment_method' => $paymentMethod,
                'payment_status' => PaymentStatuses::NOT_PAID,
                'delivery_status' => DeliveryStatuses::PENDING,
                'user_id' => $user->id,
                'total' => array_reduce($orderItems, function ($carry, $item) {
                    return $carry + $item['price'] * $item['quantity'];
                }),
                'user_address_id' => $userAddressId,
                'special_request' => $request->special_request,
                'is_export_invoice' => $request->is_export_invoice ?? 0,
            ]);

            if($order) {
                foreach($orderItems as $item) {
                    $orderItem = $this->orderItemService->create([
                        'order_id' => $order->id,
                        'book_id' => $item['book_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);

                    if($orderItem) {
                        $this->cartService->delete(intval($item['cart_id']));
                    }
                }
            }
            
            DB::commit();
            return redirect()->route('payments.result')
                ->with('isSuccess', true)
                ->with('orderId', $order->id);
        }
        catch(Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('payments.result')
                ->with('isSuccess', false);
        }
    }

    public function process(Request $request) {
        $bookIds = $request->book_ids;
        $cartIds = $request->cart_ids;
        $books = $request->books;
        $quantities = $request->quantities;
        $prices = $request->prices;
        $paymentMethod = $request->payment_method_hidden;
        $orderItems = [];
        for($i = 0; $i < count($bookIds); $i++) {
            $orderItems[] = [
                'book_id' => $bookIds[$i],
                'cart_id' => $cartIds[$i],
                'book' => json_decode($books[$i]),
                'quantity' => $quantities[$i],
                'price' => $prices[$i],
            ];
        }
        session()->put('order_items', $orderItems);
        session()->put('payment_method', $paymentMethod);
        return redirect()->route('orders.index');
    }

    public function detail(Request $request) {
        $user = auth('user:web')->user();
        $orderId = $request->route('id');
        $order = $this->orderService->getById($orderId);

        if(!$order) {
            return abort(404);
        }

        if($order->user_id != $user->id) {
            return abort(403);
        }

        return $this->getView('order.detail', [
            'order' => $order,
        ]);
    }

}
