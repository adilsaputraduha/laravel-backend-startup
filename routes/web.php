<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TestimonialCourseController;
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
Route::post('/user/save', [UserController::class, 'save'])->name('usersave');
Route::put('/user/update', [UserController::class, 'update'])->name('userupdate');
Route::delete('/user/delete', [UserController::class, 'delete'])->name('userdelete');
Route::put('/user/reset', [UserController::class, 'reset'])->name('userreset');
// Customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
// Product Category
Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('productcategory');
Route::post('/product-category/save', [ProductCategoryController::class, 'save'])->name('saveproductcategory');
Route::put('/product-category/update', [ProductCategoryController::class, 'update']);
Route::delete('/product-category/delete', [ProductCategoryController::class, 'delete']);
// Role
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/role/save', [RoleController::class, 'save'])->name('saverole');
Route::put('/role/update', [RoleController::class, 'update'])->name('updaterole');
Route::delete('/role/delete', [RoleController::class, 'delete'])->name('deleterole');
// Store
Route::get('/store', [StoreController::class, 'index'])->name('store');
// Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/product/save', [ProductController::class, 'save'])->name('productsave');
Route::put('/product/update', [ProductController::class, 'update'])->name('productupdate');
Route::delete('/product/delete', [ProductController::class, 'delete']);
// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction-by-status', [TransactionController::class, 'detail'])->name('transactionbystatus');
Route::get('/transaction-detail/{id}', [TransactionController::class, 'detailtransaction'])->name('transactiondetail');
Route::post('/transaction/updatestatus', [TransactionController::class, 'updatestatus'])->name('updatestatus');
Route::post('/transaction/updatestatusdetail', [TransactionController::class, 'updatestatusdetail'])->name('updatestatusdetail');
// Course
Route::get('/course', [CourseController::class, 'index'])->name('course');
// Review
Route::get('/review', [ReviewController::class, 'index'])->name('review');
// Feature
Route::get('/feature', [FeatureController::class, 'index'])->name('feature');
// Member
Route::get('/member', [MemberController::class, 'index'])->name('membercourse');
Route::post('/member/updatestatus', [MemberController::class, 'updatestatus'])->name('updatestatusmember');
// Testimonial
Route::get('/testimonial', [TestimonialCourseController::class, 'index'])->name('testimonial');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
