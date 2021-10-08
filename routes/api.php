<?php

use App\Http\Controllers\Api\CourierController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login']);
Route::post('/logincustomer', [CustomerController::class, 'logincustomer']);
Route::post('/update-profile', [CustomerController::class, 'updateprofile']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/registercustomer', [CustomerController::class, 'registercustomer']);
Route::get('/store', [StoreController::class, 'list']);
Route::get('/store-product/{id}', [StoreController::class, 'storeproduct']);
Route::get('/product-category', [ProductCategoryController::class, 'list']);
Route::get('/category-product/{id}', [ProductCategoryController::class, 'categoryproduct']);
Route::get('/courier', [CourierController::class, 'list']);
Route::get('/product', [ProductController::class, 'list']);
Route::get('/product-filter/{id}', [ProductController::class, 'listfilter']);
Route::get('/product/{id}', [ProductController::class, 'listdetail']);
Route::get('/product-search/{nama}', [ProductController::class, 'listsearch']);
Route::get('/productbycategory/{id}', [ProductController::class, 'listbycategory']);
Route::get('/productlimit', [ProductController::class, 'listlimit']);
Route::get('/productrating/{rating}/{id}', [ProductController::class, 'updaterating']);
Route::get('/product-latest', [ProductController::class, 'latest']);
Route::post('/checkout', [TransactionController::class, 'save']);
Route::get('/checkout/{id}', [TransactionController::class, 'history']);
Route::get('/checkout-detail/{id}', [TransactionController::class, 'historytransaksidetail']);
Route::get('/checkout/{id}/{status}', [TransactionController::class, 'historybystatus']);
Route::post('/cancel/{id}', [TransactionController::class, 'cancel']);
Route::post('/upload', [TransactionController::class, 'uploadbukti']);
// Api Partner
Route::get('/partner-history/{id}', [TransactionController::class, 'partnerhistory']);
Route::get('/partner-history/{id}/{status}', [TransactionController::class, 'partnerhistorybystatus']);
Route::get('/partner-product/{id}', [ProductController::class, 'partnerlist']);
Route::post('/partner-status/{id}', [TransactionController::class, 'partnerchangestatus']);
Route::post('/partner-delivery/{id}/{delivery}', [TransactionController::class, 'partnerchangedelivery']);
// Route::get('/partner-resi', [TransactionController::class, 'partnerresi']);
Route::post('/partner-login', [StoreController::class, 'partnerlogin']);
