<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\WhishListApiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CustomerAddressApiController;
use App\Http\Controllers\YourOrderApiController;
use App\Http\Controllers\CCAvenueController;
use App\Http\Controllers\PaymentController;
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

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/user', [ApiAuthController::class, 'user']);
    Route::get('/cart', [ShoppingCartController::class, 'index']);
    Route::post('/cart', [ShoppingCartController::class, 'store']);
    Route::post('/cart-update', [ShoppingCartController::class, 'update']);
    Route::post('/cart-delete', [ShoppingCartController::class, 'destroy']);
    Route::post('/cart-clear', [ShoppingCartController::class, 'clearCart']);
    // wish List
    Route::get('/wish-list', [WhishListApiController::class, 'get_wish_list']);
    Route::post('/add-wish-list', [WhishListApiController::class, 'store']);
    Route::post('/reomve-wish-list', [WhishListApiController::class, 'remove_from_wish_list']);
    Route::post('/clear-wish-list', [WhishListApiController::class, 'clear_wish_list']);
    // review
    Route::post('/add-review', [ReviewController::class, 'store']);
    Route::get('/view-review', [ReviewController::class, 'view']);
    // customer Address
    Route::get('/address-list', [CustomerAddressApiController::class, 'list']);
    Route::get('/address-view', [CustomerAddressApiController::class, 'view']);
    Route::post('/address-add', [CustomerAddressApiController::class, 'store']);
    Route::post('/address-update', [CustomerAddressApiController::class, 'update']);
    Route::post('/address-delete', [CustomerAddressApiController::class, 'delete']);
    Route::post('/set-deafult', [CustomerAddressApiController::class, 'deafult']);
    Route::post('checkout',[ApiController::class,'checkout']);
    Route::get('/your-order', [YourOrderApiController::class, 'yourOrder']);
    Route::get('/view-order', [YourOrderApiController::class, 'viewOrder']);
    Route::get('get-delivery-charge',[ApiController::class,'getDeliveryCharge']);

});

Route::post('add-fishing_report',[ApiController::class,'add_fishing_report']);
Route::get('get-fishing_report',[ApiController::class,'getFishing_report']);
Route::get('get-fishing_report_full',[ApiController::class,'getFishing_report_full']);
Route::get('index',[ApiController::class,'index']);
Route::get('category',[ApiController::class,'category']);
Route::get('category-products',[ApiController::class,'category_products']);
Route::get('brand-products',[ApiController::class,'brand_products']);
Route::get('product-view',[ApiController::class,'product_view']);
Route::get('search',[ApiController::class,'search']);
Route::get('category_search',[ApiController::class,'category_search']);
Route::get('brand_search',[ApiController::class,'brand_search']);
Route::get('new-arrivals',[ApiController::class,'new_arrivals']);
Route::get('new-arrivals-category',[ApiController::class,'new_arrivals_category']);
Route::get('blog-view',[ApiController::class,'blogs']);
Route::get('all-blog',[ApiController::class,'all_blogs']);
Route::get('all-youtube-video',[ApiController::class,'all_youtube_video']);
Route::get('all-instagram-video',[ApiController::class,'all_instagram_video']);

// new 
Route::get('get-state',[ApiController::class,'getState']);
Route::get('get-district-by-state',[ApiController::class,'getDistrict']);
Route::post('/ccavenue/generate-payment', [PaymentController::class, 'generatePaymentRequest']);

// update complete