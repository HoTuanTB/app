<?php

namespace App\Http\Controllers;

use Shopify\Clients\Rest;
use App\Models\Order;

class ShopifyOrderController extends Controller
{
    public function syncOrder()
    {
        $client = new Rest(config('shopify-app.domain'),config('shopify-app.api_access_token'));

        $response = $client->get('orders');

        $orders = $response->getDecodedBody()['orders'] ?? [];
        foreach ($orders as $data) {
            Order::updateOrCreate(
                ['id' => $data['id']],
                [
                    'name' => $data['name'],
                    'order_number' => $data['order_number'],
                    'app_id' => $data['app_id'] ?? null,
                    'checkout_id' => $data['checkout_id'] ?? null,
                    'confirmation_number' => $data['confirmation_number'] ?? null,
                    'order_status_url' => $data['order_status_url'] ?? null,
                ]
            );
        }

        return response()->json(['message' => 'Orders synced successfully']);
    }

    public function deleteAllOrders() {
        Order::truncate();
        return response()->json(['message' => 'Orders delete successfully']);
    }
}
