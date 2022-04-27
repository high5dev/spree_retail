<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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


//--Api V1 Routes--
Route::prefix('v1')->group(function () {


    //Auth Routes
    Route::post('/login', 'Api\v1\AuthController@login');
    Route::post('/register', 'Api\v1\AuthController@register');
    Route::post('/reset-password', 'Api\v1\AuthController@sendResetLinkEmail');

    //--Profile Routes--
    Route::prefix('profile')->middleware(['auth:sanctum','can:isStandard'])->group(function () {

        Route::get('/', 'Api\v1\User\ProfileController@index');

        Route::get('/card', 'Api\v1\User\ProfileController@card');
        Route::post('/card/store','Api\v1\User\ProfileController@cardStore');
        Route::delete('/card/destroy','Api\v1\User\ProfileController@cardDestroy');

        Route::get('/address','Api\v1\User\ProfileController@address');
        Route::post('/address/store','Api\v1\User\ProfileController@addressStore');
        Route::put('/address/update/{id}','Api\v1\User\ProfileController@addressUpdate');

        Route::get('/order','Api\v1\User\ProfileController@order');
        Route::get('/order/{id}/shipping-status','Api\v1\User\ProfileController@fedexStatus');
        Route::get('/order/{id}/products','Api\v1\User\ProfileController@orderProducts');

        //Route::get('/payment','User\ProfileController@payment')->name('.payment');
        Route::get('/save-for-later','User\ProfileController@saveForLater')->name('.saveForLater');
        Route::get('/order/{order_id}/{product_id}/delivered', 'User\ProfileController@orderReceived')->name('.order.delivered');
        Route::get('/order/{order_id}/{product_id}/cancel','User\ProfileController@orderCancel')->name('.order.cancel');
        Route::get('/order/{order_id}/{product_id}/refund','User\ProfileController@orderRefund')->name('.order.refund');

    });

    //--Profile Routes--
    Route::prefix('cart')->middleware(['auth:sanctum','can:isStandard'])->group(function () {

        Route::get('/','Api\v1\User\CartController@index');
        Route::post('/store','Api\v1\User\CartController@store');
        Route::delete('/destroy','Api\v1\User\CartController@destroy');

        Route::get('/info','Api\v1\User\CheckoutController@index');
        //Route::post('/checkout','User\CheckoutController@index')->name('checkout.index');

//        Route::get('/cart/empty','User\CartController@empty')->name('cart.empty');
//        Route::get('/cart/shipping','User\CartController@shipping')->name('cart.shipping');
//        Route::post('/cart/store','User\CartController@store')->name('cart.store');
//        Route::get('/cart/{id}','User\CartController@destroy')->name('cart.destroy');
//        Route::get('/cart/saveForLater/{id}', 'User\CartController@saveForLater')->name('cart.saveForLater');
//        Route::get('/cart/destroy/saveForLater/{id}', 'User\CartController@destroy_saveForLater')->name('cart.saveForLater.destroy');
//        //Checkout Routes
//        Route::post('/checkout','User\CheckoutController@index')->name('checkout.index');
//        Route::post('/checkout/store', 'User\CheckoutController@store')->name('checkout.store');

    });
    /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/product/{id}','Api\v1\ProductController@show');
    Route::get('/sub-categories','Api\v1\ProductController@subCategory');
    Route::get('/sub-categories/products','Api\v1\ProductController@subCategoryProducts');
    Route::get('/featured-categories','Api\v1\ProductController@featuredCategory');
    Route::get('/featured-categories/products','Api\v1\ProductController@featuredCategoryProduct');
    Route::get('/products/new-arrival','Api\v1\ProductController@new-arrival');
    Route::get('/products/main','Api\v1\ProductController@main');
    Route::get('/category','Api\v1\ProductController@child');
    Route::get('/search','Api\v1\ProductController@search');
    Route::get('/brands','Api\v1\ProductController@brands');
    Route::get('/brand/products','Api\v1\ProductController@brandProducts');

    Route::group(['namespace' => 'Api\v1'], function($v1){
        $v1->get('/banner', 'BannerController@index');
        $v1->get('/recommended-products/{product_id}', 'ProductController@getRecommendations');
        $v1->get('/featured/brand', 'BannerController@getFeaturedBrands');
    });

    //Route::resource('/product','Product\ProductController')->only('index','show');

});
