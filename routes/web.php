<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
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

Route::get('/', [HomeController::class, 'index']);
// User
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/save', [UserController::class, 'save']);
// Product Category
Route::get('/product-category', [ProductCategoryController::class, 'index']);
Route::post('/product-category/save', [ProductCategoryController::class, 'save']);
Route::put('/product-category/update', [ProductCategoryController::class, 'update']);
Route::delete('/product-category/delete', [ProductCategoryController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
