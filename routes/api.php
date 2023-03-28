<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CartController;

//Endpoints Item
Route::get('/', [App\Http\Controllers\Api\ItemController::class, 'index'])->name('itemsApi');
Route::get('showItem/{id}', [ItemController::class, 'show'])->name('showItemApi');

//Endpoints User
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('loginUserApi');
    Route::post('/register', [AuthController::class, 'register'])->name('registerUserApi');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logoutUserApi');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refreshUserApi');
    Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('profileUserApi'); 
    Route::delete('/deleteUser/{id}',[UserController::class,'destroy'])->middleware('CheckUser')->name('destroyUserApi'); 
    Route::put('/updateUser/{id}', [UserController::class,'update'])->middleware('CheckUser')->name('updateUserApi');  
});

//Endpoints Cart

Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('add');
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('update');
});

//ShowItem API

Route::get('showItem/{id}', [ItemController::class, 'show'])->name('showItemApi');