<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Cleaner Routes
// Route::middleware(['auth', 'role:Cleaner'])->group(function () {
Route::get('/cleaner/dashboard', [CleanerController::class, 'dashboard'])->name('cleaner.dashboard');
Route::get('/cleaner/service', [CleanerController::class, 'index'])->name('cleaner.service.index');
Route::post('/cleaner/order/{id}/update-status', [CleanerController::class, 'updateStatus'])->name('cleaner.order.updateStatus');

Route::get('/cleaner/service/create', [CleanerController::class, 'createService'])->name('cleaner.services.create');
Route::post('/cleaner/service', [CleanerController::class, 'storeService'])->name('cleaner.services.store');
Route::get('/cleaner/service/{service}', [CleanerController::class, 'showService'])->name('cleaner.services.show');
Route::get('/cleaner/service/{service_name}/edit', [CleanerController::class, 'editService'])->name('cleaner.services.edit');
Route::put('/cleaner/service/{service}', [CleanerController::class, 'updateService'])->name('cleaner.services.update');
Route::delete('/cleaner/service/{service_name}', [CleanerController::class, 'destroyService'])->name('cleaner.services.destroy');
// });


// User Routes
// Route untuk dashboard pengguna
Route::get('/user/dashboard', [ServiceController::class, 'dashboard'])->name('user.dashboard');
// Route untuk melihat semua Service
Route::get('/user/services', [ServiceController::class, 'services'])->name('user.services');
Route::get('/user/service/{service}', [ServiceController::class, 'show'])->name('user.service.show');
Route::get('/user/service', [ServiceController::class, 'index'])->name('user.service.index');


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::patch('/cleaner/orders/{order}/status', [CleanerController::class, 'updateStatus'])->name('cleaner.orders.status');

// Route::get('/dashboard', [ServiceController::class, 'index'])->name('user.dashboard');
Route::post('/newsletter/subscribe', [ServiceController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

Route::get('/cleaner/dashboard', [CleanerController::class, 'index'])->name('cleaner.dashboard');
Route::get('cleaner/service/create', [CleanerController::class, 'createService'])->name('cleaner.services.create');
Route::post('cleaner/service/create', [CleanerController::class, 'storeService'])->name('cleaner.services.store');

// Route::post('cleaner/service/store', [CleanerController::class, 'storeService'])->name('cleaner.services.store');
// Route::get('/orders/create', [OrderController::class, 'create'])->name('user.order.create');
// Route::get('user/order/create/{service_id}', [OrderController::class, 'create'])->name('user.order.create');

Route::get('user/order/create', [OrderController::class, 'create'])->name('user.order.create');
// Remove duplicate routes and keep only these
Route::post('user/order/store', [OrderController::class, 'store'])->name('user.order.store');
Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
// Route::post('user/order/create', [OrderController::class, 'store'])->name('user.order.store');
// Route::post('/order/store', [OrderController::class, 'store'])->name('user.order.store');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/invoice/download/{id}', [PaymentController::class, 'downloadInvoice'])->name('payment.downloadInvoice');
// Hapus semua route yang duplikat dan gunakan group untuk rute user
Route::group(['middleware' => 'auth'], function () {
    // Order routes
    Route::get('user/order/create', [OrderController::class, 'create'])->name('user.order.create');
    Route::post('user/order/store', [OrderController::class, 'store'])->name('user.order.store');

    // Payment routes
    Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');