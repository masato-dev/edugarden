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
        $data = array_merge(['user_id' => $user->id], $request->all());
        try {
            $created = $this->cartService->create($data);
            if($created)
                return $this->success('Store new cart item successfully', $created);
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
                return $this->success('Update cart successfully', $updated);
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
}
