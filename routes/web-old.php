<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CCAvenueController;
use App\Http\Controllers\CCAvenueNewController;
use App\Http\Controllers\PaymentController;
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

// Route::get('/imageget', function () {
//      return view ('welcome');
//     $imag='https://bill.tackletips.in/uploads/product/16645160503821.png';
//   return $imag;
// //   json_decode(file_get_contents('https://api.currencylayer.com/convert?access_key=3917078f11ba5a7adfdde6c9c37c26db&from=USD&to=GBP&amount='.$amt),true);
// });

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
 Route::get('/pay-cc', function () {
     return view ('front-end.payment.pay');
 });

 Route::get('order-updation', 'App\Http\Controllers\AnotherTransactionController@order_updation');
  Route::get('user-updation', 'App\Http\Controllers\AnotherTransactionController@user_updation');
 
Route::get('autocomplete', 'App\Http\Controllers\ShoppingController@autocomplete')->name('autocomplete');
Route::get('shipment-tracking/{id}', 'App\Http\Controllers\FrontController@shipment_tracking');
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('products/{id}', 'App\Http\Controllers\CategoryController@main_category_products')->name('products');
Route::get('category-products/{id}', 'App\Http\Controllers\CategoryController@category_products')->name('category_products');
Route::get('brand-products/{id}', 'App\Http\Controllers\BrandProductController@brand_products')->name('brand_products');
Route::get('product-view/{id}', 'App\Http\Controllers\SingleProductController@product_view')->name('product_view');
Route::post('fish-report-post','App\Http\Controllers\AnotherTransactionController@add_new_fish_report');
Route::get('fish-report', 'App\Http\Controllers\AnotherTransactionController@fish_report')->name('fish-report');
Route::get('about-us', 'App\Http\Controllers\AnotherTransactionController@about_us');
Route::get('privacy-policy', 'App\Http\Controllers\AnotherTransactionController@privacy_policy');
Route::get('refund-cancellation-policy', 'App\Http\Controllers\AnotherTransactionController@refund_cancellation_policy');
Route::get('shipping-policy', 'App\Http\Controllers\AnotherTransactionController@shipping_policy');
Route::get('addcart','App\Http\Controllers\CartController@addcart');
Route::get('addcart-total','App\Http\Controllers\CartController@addcart_total');
Route::get('addcart-count','App\Http\Controllers\CartController@addcart_count');
Route::get('my-cart','App\Http\Controllers\CartController@my_cart');
Route::get('remove-cart/{id}','App\Http\Controllers\CartController@remove_cart');
Route::get('remove-all-cart/','App\Http\Controllers\CartController@remove_all_cart');
Route::post('update-cart/','App\Http\Controllers\CartController@update_cart');
// complete
Route::post('/ccavenue/callback', 'App\Http\Controllers\CCAvenueController@handleCallback');

Route::get('search', 'App\Http\Controllers\FrontController@search')->name('search');
Route::post('add-review', 'App\Http\Controllers\FrontController@add_review')->name('add_review');


Route::get('forgot-password', 'App\Http\Controllers\FrontController@forgot_password')->name('forgot password');

Route::post('forgot-password-post','App\Http\Controllers\FrontController@forgot_password_post');

Route::get('fish-report-new', 'App\Http\Controllers\FrontController@fish_report_new')->name('fish-report-new');



Route::post('get-district-by-state','App\Http\Controllers\FrontController@getdistrict');

Route::get('getdeliverycharge/{id}', 'App\Http\Controllers\FrontController@getdeliverycharge');
Route::get('new-arrivals', 'App\Http\Controllers\FrontController@new_arrivals');
Route::get('new-arrivals/{id}', 'App\Http\Controllers\FrontController@new_arrivals_category');

Route::post('razorpay-payment', 'App\Http\Controllers\FrontController@razore_payment')->name('razorpay.payment.store');
Route::get('terms-and-conditions', 'App\Http\Controllers\AnotherTransactionController@terms_and_conditions');

Route::get('success-payment', 'App\Http\Controllers\AnotherTransactionController@success_payment')->name('success-payment');
Route::get('failure-payment', 'App\Http\Controllers\AnotherTransactionController@failure_payment')->name('failure-payment');

Route::get('blog/{id}', 'App\Http\Controllers\FrontController@blogss')->name('blogs');


// Route::get('getdeliverycharge',function(){
//              return 500;
//          });

Route::get('pass-decrypt', 'App\Http\Controllers\FrontController@pass_decrypt');
Route::get('pass-updation', 'App\Http\Controllers\FrontController@pass_updation');

Route::get('checkout','App\Http\Controllers\FrontController@checkout');

Route::get('my-login', 'App\Http\Controllers\FrontController@my_login')->name('my_login');
Route::post('customer-registration/','App\Http\Controllers\FrontController@customer_registration');
Route::post('customer-login', 'App\Http\Controllers\FrontController@login')->name('check-customer_login');
Route::post('shop-complete', 'App\Http\Controllers\FrontController@shop_complete')->name('shop-complete');
Route::get('logout', 'App\Http\Controllers\FrontController@logout')->name('logout');
Route::get('/add-to-wishlist/', 'App\Http\Controllers\FrontController@add_wish_list')->name('add_wish_list');
Route::get('wish-list', 'App\Http\Controllers\FrontController@wish_list')->name('wish_list');
Route::get('wish-list-delete/{id}', 'App\Http\Controllers\FrontController@wish_list_delete')->name('wish_list_delete');
Route::post('wish-to-cart', 'App\Http\Controllers\FrontController@wish_to_cart')->name('wish_to_cart');
Route::post('payment_response', 'App\Http\Controllers\FrontController@payment_response');
Route::get('getChecksum','App\Http\Controllers\FrontController@getChecksum');

Route::get('clear-wishlist', 'App\Http\Controllers\FrontController@clear_wishlist')->name('clear_wishlist');

Route::get('contact', 'App\Http\Controllers\FrontController@contact')->name('contact');

Route::get('thanks', 'App\Http\Controllers\FrontController@thanks')->name('tanks');
Route::get('my-account', 'App\Http\Controllers\FrontController@my_account')->name('my_account');

// Route::get('/ccavenue/pay', [CCAvenueNewController::class, 'pay'])->name('ccavenue.pay');
// Route::post('/ccavenue/response', [CCAvenueNewController::class, 'response'])->name('ccavenue.response');

Route::get('/my-admin', function () {
    return view('admin/login');
});


Route::post('/myadmin-login','App\Http\Controllers\ShoppingController@check_login')->name('admin-login');
Route::get('/myadmin-logout','App\Http\Controllers\ShoppingController@myadmin_logout')->name('admin-logout');


Route::get('admin/dash-board','App\Http\Controllers\ShoppingController@dash_board');

Route::get('category/categories','App\Http\Controllers\ShoppingController@list_category')->name('catalog.category');
Route::get('category/add-categories','App\Http\Controllers\ShoppingController@add_category')->name('catalog.add_category');
Route::post('add-new-category','App\Http\Controllers\ShoppingController@add_new_category')->name('catalog.new_category');
Route::get('edit-category/{id}', 'App\Http\Controllers\ShoppingController@edit_category')->name('catalog.edit_category');
Route::post('update-category', 'App\Http\Controllers\ShoppingController@update_category')->name('catalog.update_category');
Route::get('delete-category/{id}', 'App\Http\Controllers\ShoppingController@delete_category')->name('catalog.delete_category');


Route::get('/teststock', 'App\Http\Controllers\ShoppingController@test');

Route::get('/products', 'App\Http\Controllers\ShoppingController@list_products')->name('catalog.products');
Route::get('view-product/{id}', 'App\Http\Controllers\ShoppingController@view_product')->name('catalog.view.products');
Route::get('/add-product', 'App\Http\Controllers\ShoppingController@add_product')->name('catalog.add_product');

Route::post('/add-new-product', 'App\Http\Controllers\ShoppingController@add_new_product')->name('catalog.add_new_product');

Route::get('/edit-product/{id}', 'App\Http\Controllers\ShoppingController@edit_product')->name('catalog.edit-product');
Route::post('/update-product', 'App\Http\Controllers\ShoppingController@update_product')->name('catalog.update-product');
Route::get('/delete-product/{id}', 'App\Http\Controllers\ShoppingController@delete_product')->name('catalog.delete-product');
Route::get('/items_image/edit/{id}', 'App\Http\Controllers\ShoppingController@image_edit');
Route::get('/product_image_delete/{id}', 'App\Http\Controllers\ShoppingController@product_delete_image');
Route::post('/product/image', 'App\Http\Controllers\ShoppingController@product_post_image')->name('product/image');
Route::post('/add-addon-product', 'App\Http\Controllers\ShoppingController@add_addon_product')->name('catalog.add_addon_product');


Route::get('/add-addon/{id}', 'App\Http\Controllers\ShoppingController@add_addon')->name('product.add-addon');



Route::get('/reset-stock/{id}', 'App\Http\Controllers\ShoppingController@reset_product_stock')->name('product.stock-reset');

Route::get('/reset-stock-product/{id}', 'App\Http\Controllers\ShoppingController@reset_stock')->name('product.reset-stock');

Route::post('/add-stock-product', 'App\Http\Controllers\ShoppingController@add_stock_product')->name('catalog.add_stock_product');



Route::get('/user_reviews', 'App\Http\Controllers\ShoppingController@user_reviews')->name('catalog.reviews');
Route::get('/edit-review-stat/{id}', 'App\Http\Controllers\ShoppingController@edit_review_status')->name('catalog.edit.reviews');
Route::post('update-review','App\Http\Controllers\ShoppingController@update_review')->name('catalog.update.review');
Route::get('delete-review-stat/{id}', 'App\Http\Controllers\ShoppingController@delete_review')->name('catalog.delete.review');

//customers
Route::get('/ad_customers', 'App\Http\Controllers\ShoppingController@list_customers')->name('catalog.ad_customers');
Route::get('/view-ad-customer/{id}', 'App\Http\Controllers\ShoppingController@view_ad_customer')->name('catalog.view_ad_customer');

Route::get('block-customer/{id}', 'App\Http\Controllers\ShoppingController@block_customer')->name('sales.customer_block');
Route::get('unblock-customer/{id}', 'App\Http\Controllers\ShoppingController@unblock_customer')->name('sales.customer_unblock');

//sales

Route::get('/ad_purchase', 'App\Http\Controllers\ShoppingController@ad_purchase')->name('sales.orders');
Route::get('view-purchase-list/{id}', 'App\Http\Controllers\ShoppingController@view_purchase_list')->name('sales.view_purchase_list');


Route::get('/ad_orders', 'App\Http\Controllers\ShoppingController@ad_orders')->name('sales.admin.orders');
Route::get('/ad_orders/un-paid', 'App\Http\Controllers\ShoppingController@ad_orders_unpaid');
Route::get('view-order-list/{id}', 'App\Http\Controllers\ShoppingController@view_orders_list')->name('sales.view-orders');
Route::post('/update-order-status', 'App\Http\Controllers\ShoppingController@update_order_status')->name('sales.update_order_status');
Route::get('/order_invoice/{id}', 'App\Http\Controllers\ShoppingController@order_invoice')->name('sales.invoice');
Route::post('/update-order-courier-detail', 'App\Http\Controllers\ShoppingController@update_order_courier_detail');

Route::get('/unit', 'App\Http\Controllers\ShoppingController@ad_unit')->name('attributes.ad_unit');
Route::get('/add-unit', 'App\Http\Controllers\ShoppingController@add_unit')->name('images.add_unit');
Route::post('/add-new-unit', 'App\Http\Controllers\ShoppingController@add_new_unit')->name('images.add_new_unit');

Route::get('/edit-unit/{id}', 'App\Http\Controllers\ShoppingController@edit_unit')->name('ads.edit-unit');
Route::post('/update-unit', 'App\Http\Controllers\ShoppingController@update_unit')->name('catalog.update_unit');
Route::get('delete-unit/{id}', 'App\Http\Controllers\ShoppingController@delete_unit')->name('catalog.delete_unit');



Route::get('/brands', 'App\Http\Controllers\ShoppingController@ad_brands')->name('attributes.ad_brands');
Route::get('/add-brand', 'App\Http\Controllers\ShoppingController@add_brand')->name('images.add_brand');
Route::post('/add-new-brand', 'App\Http\Controllers\ShoppingController@add_new_brand')->name('images.add_new_brand');

Route::get('/set-featured/{id}', 'App\Http\Controllers\ShoppingController@set_product_featured')->name('ads.set_product_featured');
Route::get('/set-unfeatured/{id}', 'App\Http\Controllers\ShoppingController@set_product_unfeatured')->name('ads.set_product_unfeatured');

Route::get('/set-sessonal/{id}', 'App\Http\Controllers\ShoppingController@set_product_sessonal')->name('ads.set_product_sessonal');
Route::get('/set-unsessonal/{id}', 'App\Http\Controllers\ShoppingController@set_product_unsessonal')->name('ads.set_product_unsessonal');


Route::get('/edit-brands/{id}', 'App\Http\Controllers\ShoppingController@edit_brands')->name('ads.edit-brands');
Route::post('/update-brands', 'App\Http\Controllers\ShoppingController@update_brands')->name('catalog.update_brands');
Route::get('/view-brands/{id}', 'App\Http\Controllers\ShoppingController@view_brands')->name('ads.view_brands');
Route::get('delete-brands/{id}', 'App\Http\Controllers\ShoppingController@delete_brands')->name('catalog.delete_brands');


Route::get('out-of-stock-list', 'App\Http\Controllers\ShoppingController@out_of_stock')->name('out_of_stock');

Route::get('view-out-of-stock-list/{id}', 'App\Http\Controllers\ShoppingController@view_out_of_stock')->name('/admin/view_out_of_stock');

Route::get('slider-images', 'App\Http\Controllers\ShoppingController@all_slider_images')->name('slider-images');
Route::get('add-slider-images', 'App\Http\Controllers\ShoppingController@add_slider_images')->name('add-slider-images');
Route::post('add-slider-img', 'App\Http\Controllers\ShoppingController@add_slider_img')->name('add-slider-img');
Route::get('delete-slider-image/{id}', 'App\Http\Controllers\ShoppingController@delete_slider_image');

Route::get('admn-daily-deals', 'App\Http\Controllers\ShoppingController@daily_deals')->name('/admin/daily_deals');
Route::get('/admin/add-deal', 'App\Http\Controllers\ShoppingController@admin_add_Deal')->name('/admin/admin_add_Deal');
Route::post('/add-new-deal/', 'App\Http\Controllers\ShoppingController@add_new_deal')->name('/admin/add_new_deal');
Route::get('/delete-daily-deal/{id}', 'App\Http\Controllers\ShoppingController@delete_deal')->name('/admin/delete_deal');


Route::get('/adm-blog-cat', 'App\Http\Controllers\ShoppingController@blog_category')->name('admin.blog_category');
Route::get('/admin/add-blog-cat', 'App\Http\Controllers\ShoppingController@add_blog_cat')->name('/admin/add_blog_cat');
Route::post('/add-new-blog-cat/', 'App\Http\Controllers\ShoppingController@add_new_blog_cat')->name('/admin/add_new_blog_cat');
Route::get('/adm-edit-blog-cat/{id}', 'App\Http\Controllers\ShoppingController@admin_edit_blog_cat')->name('/admin/admin_edit_blog_cat');
Route::post('/update-blog-cat', 'App\Http\Controllers\ShoppingController@update_blog_cat')->name('/admin/update_blog_cat');
Route::get('/delete-blog-cat/{id}', 'App\Http\Controllers\ShoppingController@delete_blog_cat')->name('/admin/delete_blog_cat');

Route::get('/admin/blog', 'App\Http\Controllers\ShoppingController@admin_blog')->name('/admin/admin_blog');
Route::get('/admin/add-blog', 'App\Http\Controllers\ShoppingController@admin_add_blog')->name('/admin/admin_add_blog');
Route::get('view-blog/{id}', 'App\Http\Controllers\ShoppingController@admin_view_blog')->name('/admin/view_blog');
Route::post('/add-new-blog/', 'App\Http\Controllers\ShoppingController@add_new_blog')->name('/admin/add_new_blog');
Route::get('/adm-edit-blog/{id}', 'App\Http\Controllers\ShoppingController@admin_edit_blog')->name('/admin/edit_blog');
Route::post('/update-blog', 'App\Http\Controllers\ShoppingController@update_blog')->name('/admin/update_blog');
Route::get('/delete-blog/{id}', 'App\Http\Controllers\ShoppingController@delete_blog')->name('/admin/delete_blog');
Route::get('/delete-ads/{id}', 'App\Http\Controllers\ShoppingController@delete_ads')->name('/admin/delete-ads');


Route::get('/admin/testimonial', 'App\Http\Controllers\ShoppingController@admin_testimonial')->name('/admin/admin_testimonial');
Route::get('/admin/add-testimonial', 'App\Http\Controllers\ShoppingController@admin_add_testimonial')->name('/admin/admin_add_testimonial');
Route::post('/add-new-testimonial/', 'App\Http\Controllers\ShoppingController@add_new_testimonial')->name('/admin/add_new_testimonial');
Route::get('/delete-testimonial/{id}', 'App\Http\Controllers\ShoppingController@delete_testimonial')->name('/admin/delete_testimonial');


Route::get('/ccavenue/pay', [CCAvenueController::class, 'pay'])->name('ccavenue.pay');
Route::post('/ccavenue/response', [CCAvenueController::class, 'response'])->name('ccavenue.response');

Route::get('/payment', [PaymentController::class, 'initiatePayment']);
Route::post('/payment-response', [PaymentController::class, 'paymentResponse']);
