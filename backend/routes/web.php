<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopifyOrderController;
use Illuminate\Support\Facades\Route;
use Shopify\Clients\Rest;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [OrderController::class, 'getOrders']);
