<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LienHeController;
use \App\Http\Controllers\AccountController;

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

Route::get('/index', function () {
    return view('home');
});
Route::middleware('auth')->group(function () {
    Route::view('/admin/home', 'admin.home')->name('admin.home');
});

// Customer routes

Route::get('/customer/index', [\App\Http\Controllers\UserController::class,'showdata'])->name('customer.index');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


// khi vào link liên hệ sẽ vào LienHeController , function showData
Route::get('/account',[AccountController::class, "showAcc"]);

Route::get('/addAccount',[AccountController::class, "addAcc"]);
Route::post("/accountSave", [AccountController::class, "save"]);
Route::get("/account_delete/{id}", [AccountController::class, "delete"]);
Route::get("/account_update/{id}", [AccountController::class, "update"]);
Route::post("/accountSaveUpdate", [AccountController::class, "saveUpdate"]);


Route::get("/product", [\App\Http\Controllers\ProductController::class, "getAll"]);
Route::get("/productAdd", [\App\Http\Controllers\ProductController::class, "add"]);
Route::post("/productSave", [\App\Http\Controllers\ProductController::class, "save"]);
Route::get("/product_delete/{id}", [\App\Http\Controllers\ProductController::class, "delete"]);
Route::get("/product_update/{id}", [\App\Http\Controllers\ProductController::class, "update"]);
Route::post("/productSaveUpdate", [\App\Http\Controllers\ProductController::class, "saveUpdate"]);


