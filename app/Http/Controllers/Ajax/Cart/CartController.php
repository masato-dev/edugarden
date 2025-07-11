<?php

namespace App\Http\Controllers\Ajax\Cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\Cart\ICartService;
use Exception;
use Illuminate\Http\Request;
use Log;

class CartController extends ApiController
{
    protected ICartService $cartService;
    public function __construct(ICartService $cartService) {
        $this->cartService = $cartService;
    }

    public function store(Request $request) {
        $user = auth('user:web')->user();
        if(empty($user))
            return $this->error('Unauthorized', 401, __('Vui lòng đăng nhập để thực hiện tính năng này'));
        $data = array_merge(['user_id' => $user->id], $request->all());
        try {
            $created = $this->cartService->create($data);
            if($created)
                return $this->success(__('Thêm vào giỏ hàng thành công'), $created);
            else
                return $this->error('Bad Request !!!', 400);
        }
        catch(Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function update(Request $request) {
        $id = $request->route('id');
        $user = auth('user:web')->user();
        $data = array_merge(['user_id' => $user->id], $request->all());
        try {
            $updated = $this->cartService->update($id, $data);
            if($updated)
                return $this->success(__('Cập nhật giỏ hàng thành công'), $updated);
            else return $this->error('Bad Request!!');
        }
        catch(Exception $e) {
            Log::error($e->getTraceAsString());
            return $this->error($e->getMessage());
        }
    }

    public function delete(Request $request) {
        $id = $request->route('id');
        try {
            $deleted = $this->cartService->delete($id);
            if($deleted)
                return $this->success('Delete cart item successfully');
            return $this->error('Bad Request');
        }

        catch(Exception $e) {
            Log::error($e->getTraceAsString());
            return $this->error($e->getMessage());
        }
    }

    public function amount(Request $request) {
        $amount = $this->cartService->amount();
        return $this->success('Get cart amount successfully', $amount);
    }
}
