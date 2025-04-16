<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopifyWebhookMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $hmacHeader = $request->header('X-Shopify-Hmac-Sha256');

        if (empty($hmacHeader)) {
            abort(401, 'Missing HMAC header');
        }

        $payload = $request->getContent();
        $secret = config('shopify-app.api_webhook_secret');

        if (! $this->isValidHmac($payload, $hmacHeader, $secret)) {
            abort(401, 'Invalid HMAC signature');
        }

        return $next($request);
    }

    protected function isValidHmac(string $data, string $hmacHeader, string $secret): bool
    {
        $calculatedHmac = base64_encode(hash_hmac('sha256', $data, $secret, true));
        return hash_equals($hmacHeader, $calculatedHmac);
    }
}
