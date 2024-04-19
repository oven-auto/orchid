<?php

use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\ProductGroupController as FrontProductGroupController;
use App\Http\Controllers\Product\IngredientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductGroupController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('products', ProductController::class)->except(['create', 'edit']);

        Route::resource('productgroups', ProductGroupController::class)->except(['create', 'edit']);

        Route::resource('ingredients', IngredientController::class)->except(['create', 'edit']);
    });


    Route::prefix('front')->group(function () {
        Route::get('products', [FrontProductController::class, 'get']);

        Route::get('productgroups', [FrontProductGroupController::class, 'get']);
    });
});
