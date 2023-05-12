<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->prefix('/admin')
    ->name('admin.')

    ->group(function () {
        Route::resource('restaurants', RestaurantController::class);
        Route::resource('dishes', DishController::class);
        Route::resource('types', TypeController::class);
        Route::get('orders/trash', [OrderController::class, 'trash'])->name('orders.trash');
        Route::put('orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');
        Route::delete('orders/{order}/force-delete', [OrderController::class, 'forceDelete'])->name('orders.force-delete');
        Route::resource('orders', OrderController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
