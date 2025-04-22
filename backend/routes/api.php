<?php

use App\Http\Controllers\ShopifyOrderController;
use Illuminate\Support\Facades\Route;

Route::delete('/delete-orders', [ShopifyOrderController::class, 'deleteAllOrders']);
Route::post('/sync-orders', [ShopifyOrderController::class, 'syncOrder']);
