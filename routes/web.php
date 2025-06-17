<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoGallaryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutUsImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\CCAvenueController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UpdationPlanController;
use App\Http\Controllers\WishListReviewWebController;
use App\Http\Controllers\AllOrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDashboardController;
use App\Http\Controllers\FishingReportController;
use App\Http\Controllers\ReviewController;
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

Route::get('/clear', function() {
    //   $mytime = Carbon\Carbon::now();
    //  return $mytime->toDateTimeString();
    $exitCode = Artisan::call('cache:clear');
     $exitCode = Artisan::call('config:clear');
     $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');

    return '<h1>cleared</h1>';
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');
// updation Plan

Route::get('category-slug', [UpdationPlanController::class, 'categorySlug']);
Route::get('sub-category-slug', [UpdationPlanController::class, 'subCategorySlug']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Admin-only routes
    Route::middleware(['is_admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'dashboard']);

    Route::resource('video-gallary', VideoGallaryController::class);
    Route::resource('testimonial', TestimonialController::class);

    Route::resource('about-us-images', AboutUsImageController::class);
    Route::resource('products', ProductController::class);
    Route::get('products.addon/{id}', [ProductController::class, 'addon']);
    Route::get('products.edit/{id}', [ProductController::class, 'edit']);
    Route::get('products.show/{id}', [ProductController::class, 'show']);

Route::get('orders-index', [AllOrderController::class, 'index'])->name('orders.index');
Route::get('orders/{id}', [AllOrderController::class, 'view'])->name('orders.view');
Route::post('/orders/{order}/update-status', [AllOrderController::class, 'updateStatus'])->name('orders.update-status');
Route::post('/orders/{order}/update-courier', [AllOrderController::class, 'updateCourier'])->name('orders.update-courier');
Route::get('/orders-processing', [AllOrderController::class, 'processing'])->name('orders.processing');
Route::get('/order/invoice/{id}', [OrderController::class, 'printInvoice'])->name('order.invoice');
Route::get('/orders-tracking', [AllOrderController::class, 'orders_tracking'])->name('orders.tracking');
Route::post('/orders/print', [OrderController::class, 'printSelected'])->name('orders.print');
Route::get('/order-dashboard', [OrderDashboardController::class, 'index'])->name('order.dashboard');

Route::patch('/orders/update-status/{orderId}', [AllOrderController::class, 'updateStatus'])->name('orders.update-status');//new route
Route::get('/order-dashboard', [OrderDashboardController::class, 'index'])->name('order.dashboard');
Route::get('/order/invoice/a4/{id}', [AllOrderController::class, 'printInvoiceA4'])->name('order.invoice');//new
Route::get('/order/invoice/thermal/{id}', [AllOrderController::class, 'printInvoicethermal'])->name('order.invoicethermal');//new

Route::get('customer-index', [CustomerController::class, 'index'])->name('customer.index');
Route::get('product-create', [ProductController::class, 'create'])->name('product.create');
Route::get('/get-subcategories/{parent_id}', [ProductController::class, 'getSubcategories']);
Route::post('/product-store', [ProductController::class, 'add_new_product'])->name('product.store');
Route::get('product-index', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}view', [ProductController::class, 'view'])->name('products.view');
Route::get('/products-edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products-update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/edit-images/{id}', [ProductController::class, 'editProductImages'])->name('edit.images');
Route::post('/product/update-images/{id}', [ProductController::class, 'updateImages'])->name('update.images');
Route::get('/product/{id}/addon', [ProductController::class, 'addon'])->name('product.addon'); 
Route::post('/product/{id}/update-addon', [ProductController::class, 'add_on_product'])->name('product.updateAddon');

Route::post('fishing-reports', [FishingReportController::class, 'store'])->name('fishing_reports.store');
Route::get('fishing-reports-pending', [FishingReportController::class, 'pending'])->name('fishing_reports.index');
Route::get('fishing-reports-active', [FishingReportController::class, 'active'])->name('fishing_reports.active');
Route::get('fishing-reports-blocked', [FishingReportController::class, 'blocked'])->name('fishing_reports.blocked');
Route::put('/fishReports/updateStatus/{id}', [FishingReportController::class, 'updateStatus'])->name('fishReports.updateStatus');
Route::get('/fishing-reports/view/{id}', [FishingReportController::class, 'viewImage'])->name('fishingReports.viewImage');

Route::get('/view', [ReviewController::class, 'view'])->name('reviews.view');
Route::get('review-pending', [ReviewController::class, 'review_pending'])->name('reviews.pending');
Route::get('review-active', [ReviewController::class, 'review_active'])->name('reviews.active');
Route::get('review-block', [ReviewController::class, 'review_block'])->name('reviews.block');
Route::patch('/reviews/{id}/activate', [ReviewController::class, 'active'])->name('reviews.activate');
Route::patch('/reviews/{id}/block', [ReviewController::class, 'block'])->name('reviews.block');

Route::get('/reviews/{id}', [ReviewController::class, 'view_review'])->name('reviews.show');
});
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);

Route::get('category-products/{id}', [CategoryController::class, 'index']);
Route::get('sub-category-products/{id}', [CategoryController::class, 'subCategoryIndex']);
Route::get('brand-products/{id}', [BrandProductController::class, 'index']);
Route::get('product-view/{id}', [SingleProductController::class, 'product_view']);
Route::get('new-arrivals', [CategoryController::class, 'new_arrivals']);
Route::get('new-arrivals/{id}', [CategoryController::class, 'new_arrivals_category']);

Route::get('/filter-products', [ProductController::class, 'filter'])->name('filter.products');

Route::get('/cart/add', [CartController::class, 'addToCart'])->name('cart/add');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::get('/my-cart', [CartController::class, 'my_cart']);
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/remove-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/customer-login', [RegisterController::class, 'login_user'])->name('customer-login');
Route::post('/customer-registration', [RegisterController::class, 'register_user'])->name('customer-registration');
Route::get('/user-login', [RegisterController::class, 'login']);
Route::get('/user-register', [RegisterController::class, 'register']);
Route::get('/get-districts/{state_id}', [StateController::class, 'getDistricts'])->name('get.districts');

Route::get('/address.new', [CustomerAddressController::class, 'address_new'])->name('address.new');
Route::post('/add.new.shipping-address', [CustomerAddressController::class, 'add_new_shipping_address'])->name('add.new.shipping-address');
Route::post('/update.shipping-address', [CustomerAddressController::class, 'update_shipping_address'])->name('update.shipping-address');
Route::get('address.edit/{id}', [CustomerAddressController::class, 'address_edit'])->name('address.edit');
Route::get('address.remove/{id}', [CustomerAddressController::class, 'address_remove'])->name('address.remove');
Route::get('address.set.default/{id}', [CustomerAddressController::class, 'address_set_default'])->name('address.set.default');
Route::get('my-order', [MyOrderController::class, 'my_order'])->name('my-order');
// Route::get('order-confirmation', [MyOrderController::class, 'order_confirmation'])->name('order-confirmation');


Route::post('/add-review', [WishListReviewWebController::class, 'addReview'])->name('add-review');

Route::post('/wishlist/add', [WishListReviewWebController::class, 'addToWishList'])->name('wishlist.add');
Route::get('/wishlist', [WishListReviewWebController::class, 'index'])->name('wishlist.index');
Route::get('/wishlist/remove/{id}', [WishListReviewWebController::class, 'removeFromWishList'])->name('wishlist.remove');
Route::get('/get-delivery-charge', [CustomerAddressController::class, 'getDeliveryCharge'])->name('getDeliveryCharge');
// Route::post('/shop-complete', [CheckoutController::class, 'shopComplete'])->name('shop-complete');
Route::get('/shop-complete', [CheckoutController::class, 'shopCompleteWithoutPayment'])->name('shop-complete');

Route::get('/order-confirmation/{id}', [CheckoutController::class, 'order_confirmation'])->name('order-confirmation');

Route::get('fishing-reports-create', [FishingReportController::class, 'create'])->name('fishing_reports.create');
Route::post('/store', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/payment', [PaymentController::class, 'initiatePayment']);
Route::post('/payment-response', [PaymentController::class, 'paymentResponse']);
Route::get('privacy-policy', 'App\Http\Controllers\AnotherTransactionController@privacy_policy');
Route::get('refund-cancellation-policy', 'App\Http\Controllers\AnotherTransactionController@refund_cancellation_policy');
Route::get('shipping-policy', 'App\Http\Controllers\AnotherTransactionController@shipping_policy');
Route::get('terms-and-conditions', 'App\Http\Controllers\AnotherTransactionController@terms_and_conditions');

 Route::get('order-updation', 'App\Http\Controllers\AnotherTransactionController@order_updation');
 Route::get('user-updation', 'App\Http\Controllers\AnotherTransactionController@user_updation');
require __DIR__.'/auth.php';
