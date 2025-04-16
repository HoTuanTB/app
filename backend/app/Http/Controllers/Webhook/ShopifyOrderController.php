<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order;

class ShopifyOrderController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $order = $this->storeOrUpdate($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request): JsonResponse
    {
        $order = $this->storeOrUpdate($request->all());
        return response()->json($order, 200);
    }

    protected function storeOrUpdate(array $data): Order
    {
        return Order::updateOrCreate(
            ['id' => $data['id']],
            [
                'name' => $data['name'] ?? null,
                'order_number' => $data['order_number'] ?? null,
                'app_id' => $data['app_id'] ?? null,
                'checkout_id' => $data['checkout_id'] ?? null,
                'confirmation_number' => $data['confirmation_number'] ?? null,
                'order_status_url' => $data['order_status_url'] ?? null,
            ]
        );
    }
}
