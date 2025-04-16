<?php


namespace App\Http\Controllers\Webhook;


use App\Http\Controllers\Controller;
use App\Jobs\Webhook\ProductCreateJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopifyProductController extends Controller
{
    public function create(Request $request)
    {
        $product = $this->storeOrUpdate($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request)
    {
        $product = $this->storeOrUpdate($request->all());
        return response()->json($product, 200);
    }
    protected function storeOrUpdate(array $data): Product
    {
        return Product::updateOrCreate(
            ['shopify_product_id' => $data['id']],
            [
                'title' => $data['title'],
                'body_html' => $data['body_html'] ?? null,
                'product_type' => $data['product_type'] ?? null,
                'handle' => $data['handle'],
                'tags' => $data['tags'] ?? null,
                'status' => $data['status'],
                'admin_graphql_api_id' => $data['admin_graphql_api_id'],
            ]
        );
    }
}
