<?php

use Illuminate\Support\Facades\Route;

Route::prefix('product')->as('.product')->controller('ShopifyProductController')->group(function () {
    Route::post('create', 'create')->name('create');
    Route::post('update', 'update')->name('update');
});

Route::prefix('order')->as('.order')->controller('ShopifyOrderController')->group(function () {
    Route::post('create', 'create')->name('create');
    Route::post('update', 'update')->name('update');
});

