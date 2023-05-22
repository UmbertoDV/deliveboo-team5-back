<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('restaurants', RestaurantController::class)->except('store', 'update', 'destroy');

Route::get('/type/{type_id}/restaurants', [RestaurantController::class, 'getRestaurantByType']);


Route::get('types', [RestaurantController::class, 'types']);

Route::post('orders', [OrderController::class, 'store']);
