<?php

use App\Http\Controllers\api\v1\ApiController;
use App\Http\Controllers\api\v1\ShoppingCartAPIController;
use App\Http\Controllers\api\v1\LimitArticlesApiController;
use App\Http\Controllers\api\v1\GetStatusApiController;
use App\Http\Controllers\api\v1\BuyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/articles', ApiController::class)->only(['index', 'show', 'store']);

Route::apiResource('/shoppingcart', ShoppingCartAPIController::class)->only(['index', 'store', 'destroy']);
Route::apiResource('/limit-articles', LimitArticlesApiController::class)->only(['show']);

Route::get('/buy/{id}', [BuyController::class, 'buy']);
Route::get('/discount/{articleId}', [BuyController::class, 'discount']);