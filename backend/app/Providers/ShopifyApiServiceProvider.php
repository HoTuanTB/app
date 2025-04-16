<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shopify\Context;
use Shopify\Auth\FileSessionStorage;

class ShopifyApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Context::initialize(
             config('shopify-app.api_key'),
             config('shopify-app.api_secret'),
             config('shopify-app.api_scopes'),
            config('shopify-app.domain'),
             new FileSessionStorage('/tmp/php_sessions'),
            '2025-01',
             true,
             false,
        );
    }
}
