<?php

use App\Http\Controllers\CleanersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cleaners', [CleanersController::class, 'index'])->name('cleaners.index');
Route::get('/cleaners/create', [CleanersController::class, 'create'])->name('cleaners.create');
Route::post('/cleaners', [CleanersController::class, 'store'])->name('cleaners.store');
Route::get('/cleaners/{cleaners}', [CleanersController::class, 'show'])->name('cleaners.show');
Route::get('/cleaners/{cleaners}/edit', [CleanersController::class, 'edit'])->name('cleaners.edit');
Route::put('/cleaners/{cleaners}', [CleanersController::class, 'update'])->name('cleaners.update');
Route::delete('/cleaners/{cleaners}', [CleanersController::class, 'destroy'])->name('cleaners.destroy');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{orders}', [OrdersController::class, 'show'])->name('orders.show');
Route::get('/orders/{orders}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{orders}', [OrdersController::class, 'update'])->name('orders.update');
Route::delete('/orders/{orders}', [OrdersController::class, 'destroy'])->name('orders.destroy');

Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServicesController::class, 'create'])->name('services.create');
Route::post('/services', [ServicesController::class, 'store'])->name('services.store');
Route::get('/services/{services}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/services/{services}/edit', [ServicesController::class, 'edit'])->name('services.edit');
Route::put('/services/{services}', [ServicesController::class, 'update'])->name('services.update');
Route::delete('/services/{services}', [ServicesController::class, 'destroy'])->name('services.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{users}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{users}', [UserController::class, 'destroy'])->name('users.destroy');

