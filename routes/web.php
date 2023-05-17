<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Restaurant;
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
        Route::get('/types/trash', [TypeController::class, 'trash'])->name('types.trash');
        Route::put('/types/{type}/restore', [TypeController::class, 'restore'])->name('types.restore');
        Route::delete('/types/{type}/force-delete', [TypeController::class, 'forceDelete'])->name('types.force-delete');

        Route::resource('restaurants', RestaurantController::class)->except('create');

        Route::get('dishes/trash', [DishController::class, 'trash'])->name('dishes.trash');
        Route::put('dishes/{dish}/restore', [DishController::class, 'restore'])->name('dishes.restore');
        Route::delete('dishes/{dish}/force-delete', [DishController::class, 'forceDelete'])->name('dishes.force-delete');
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
