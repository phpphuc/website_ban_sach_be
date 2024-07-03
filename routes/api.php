<?php

use App\Http\Controllers\Api\V1\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CartDetailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {

    Route::apiResource('/products', ProductController::class);
    Route::prefix('products')->group(function () {
        // Route::get('/', [ProductController::class, 'index']); //function(){dd('hi');});
        // Route::get('/{id}', [ProductController::class, 'show']);
        // Route::post('/', [ProductController::class, 'store']);
        // Route::put('/{id}', [ProductController::class, 'update']);
        // Route::delete('/{id}', [ProductController::class, 'destroy']);
        // Route::resource('/', ProductController::class)->except(['create', 'edit'])

        Route::get('/category/{categoryId}/count', [ProductController::class, 'countByCategory']);
        Route::get('/category/{categoryId}/{page}', [ProductController::class, 'getByCategory']);
        Route::get('/author/{authorId}', [ProductController::class, 'getByAuthor']);
        Route::get('/latest/{n}', [ProductController::class, 'getLatest']);
    });

    // Route::prefix('categories')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    // Route::get('/{id}', [CategoryController::class, 'show']);
    // });

    // Route::prefix('authors')->group(function () {
    //     Route::apiResource('/', AuthorController::class);
    // });
    Route::apiResource('authors', AuthorController::class);

    // Route::prefix('carts')->group(function(){
    //     Route::apiResource('/', CartDetailController::class);
    // });
    Route::apiResource('carts', CartDetailController::class);
    Route::get('carts/user/{userId}', [CartDetailController::class, 'showByUser']);

    // Route::prefix('orders')->group(function(){
    //     Route::apiResource('/', OrderController::class);
    // });
    Route::apiResource('orders', OrderController::class);
    Route::get('orders/user/{userId}', [OrderController::class, 'showByUser']);
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AccountController::class, 'register']);
        Route::post('/login', [AccountController::class, 'login']);
        // Route::get('/logout', [AccountController::class, 'logout']);
    });
});
