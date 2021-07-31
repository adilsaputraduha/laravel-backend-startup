<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
// User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user/save', [UserController::class, 'save']);
// Product Category
Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('productcategory');
Route::post('/product-category/save', [ProductCategoryController::class, 'save']);
Route::put('/product-category/update', [ProductCategoryController::class, 'update']);
Route::delete('/product-category/delete', [ProductCategoryController::class, 'delete']);
// Role
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/role/save', [RoleController::class, 'save']);
Route::put('/role/update', [RoleController::class, 'update']);
Route::delete('/role/delete', [RoleController::class, 'delete']);
// Store
Route::get('/store', [StoreController::class, 'index'])->name('store');
// Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/product/save', [ProductController::class, 'save']);
Route::delete('/product/delete', [ProductController::class, 'delete']);
// Transaksi

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
