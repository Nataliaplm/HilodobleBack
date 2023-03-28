<?php

use App\Models\Item;
use App\Models\User;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;


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
    return view('auth.login');
});

Auth::routes();

//C del CRUD Item
Route::post('/storeItem', [ItemController::class, 'store'])->name('storeItem')->middleware('isadmin', 'auth');
Route::get('/createItem', [ItemController::class, 'create'])->name('create')->middleware('isadmin', 'auth');

//R del CRUD Item
Route::get('/home',[ItemController::class,'index'])->name('home')->middleware('isadmin', 'auth');

//U del CRUD Item
Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('editItem')->middleware('isadmin', 'auth');
Route::patch('/item/{id}', [ItemController::class, 'update'])->name('updateItem')->middleware('isadmin', 'auth');

//D del CRUD Item
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('deleteItem')->middleware('isadmin', 'auth');

//Show Item
Route::get('/showItem/{id}', [ItemController::class, 'show'])->name('showItem')->middleware('isadmin', 'auth');


//CRUD del User

//R del USER
Route::get('/usersList',[UserController::class,'usersList'])->name('usersList')->middleware('isadmin', 'auth');

//U del user
Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser')->middleware('isadmin', 'auth');
Route::patch('/user/{id}', [UserController::class, 'updateUser'])->name('updateUser')->middleware('isadmin', 'auth');

//D del user
Route::delete('/deleteUser/{id}',[UserController::class,'destroy'])->name('deleteUser')->middleware('isadmin', 'auth');

//Show
Route::get('/showUser/{id}', [UserController::class, 'show'])->name('showUser')->middleware('isadmin', 'auth');

//nonAdmin
Route::get('/userNonAdmin', function () {
    return view('userNonAdmin');
})->name('userNonAdmin');