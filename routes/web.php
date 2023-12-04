<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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

// User View
Route::get('/', [ViewController::class, 'index']);
Route::get('detail/{id}', [ViewController::class, 'detail']);
Route::get('cart/{id}', [ViewController::class, 'cart']);
Route::get('login', [ViewController::class, 'login']);
Route::get('register', [ViewController::class, 'register']);
Route::get('profile', [ViewController::class, 'profile']);

// Admin View
Route::get('admin/login', [ViewController::class, 'adminLogin']);
Route::middleware(['authAdmin'])->group(function () {
    Route::get('admin', [ViewController::class, 'adminIndex']);
    Route::get('admin/product', [ViewController::class, 'adminProduct']);
    Route::get('admin/add-product', [ViewController::class, 'adminAddProduct']);
    Route::get('admin/edit/{id}', [ViewController::class, 'adminAddProduct']);

    // Admin Main
    Route::post('admin/add', [AdminController::class, 'addProduct']);
    Route::get('admin/delete/{id}', [AdminController::class, 'deleteProduct']);
});

// User Main
Route::middleware(['authUser'])->group(function () {
    Route::post('add/cart', [UserController::class, 'addCart']);
    Route::get('delete/cart/{id}', [UserController::class, 'deleteCart']);
    Route::post('pay', [UserController::class, 'pay']);
    Route::get('flushSession', [UserController::class, 'flushSession']);
    Route::post('profile/update', [UserController::class, 'updateProfile']);
});

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('admin/login', [AuthController::class, 'adminLogin']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);
