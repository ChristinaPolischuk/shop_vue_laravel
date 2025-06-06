<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Routes
// ------------------------------------------------------
// Here is where you can register API routes for your application. These 
// routes are loaded by the RouteServiceProvider within a group which 
// is assigned the "api" middleware group. Enjoy building your API!
// ------------------------------------------------------

// Возвращает данные пользователя, если он аутентифицирован через Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/products', [App\Http\Controllers\API\Product\IndexController::class, '__invoke']);
Route::post('/products', App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/filters', App\Http\Controllers\API\Product\FilterListController::class);
Route::get('/products/{product}', App\Http\Controllers\API\Product\ShowController::class);