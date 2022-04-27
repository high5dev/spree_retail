<?php

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

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/','PagesController@home')->name('home');
Route::get('/home','PagesController@home')->name('home');
//Route::get('/test','PagesController@event')->name('test');
Route::get('/test',function (){
    return view('temp');
})->name('test');
Route::get('/test2',function (){
    return view('temp2');
})->name('test2');
Route::get('/fedex','FedexController@index')->name('fedex');
/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
Auth::routes(['verify' => true]);
/*
|--------------------------------------------------------------------------
| User Profile Routes
|--------------------------------------------------------------------------
*/


Route::prefix('profile')->name('profile')->middleware(['auth:sanctum','can:isStandard'])->group(function () {

    Route::get('/','User\ProfileController@index');
    Route::get('/payment','User\ProfileController@payment')->name('.payment');
    Route::get('/save-for-later','User\ProfileController@saveForLater')->name('.saveForLater');
    Route::get('/order','User\ProfileController@order')->name('.order');
    Route::get('/order/{order_id}/{product_id}/delivered', 'User\ProfileController@orderReceived')->name('.order.delivered');
    Route::get('/order/{order_id}/{product_id}/cancel','User\ProfileController@orderCancel')->name('.order.cancel');
    Route::get('/order/{order_id}/{product_id}/refund','User\ProfileController@orderRefund')->name('.order.refund');
    Route::get('/address','User\ProfileController@address')->name('.address');
    Route::post('/address/store','User\ProfileController@addressStore')->name('.address.store');
    Route::post('/address/update/{id}','User\ProfileController@addressUpdate')->name('.address.update');
    Route::post('/card/store','User\ProfileController@cardStore')->name('.card.store');
    Route::get('/card/destroy','User\ProfileController@cardDestroy')->name('.card.destroy');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
//Admin Login
Route::get('/admin/login','Admin\AuthController@login')->name('admin.login');

Route::prefix('admin')->name('admin')->middleware(['auth:sanctum','can:isAdmin'])->group(function () {

    Route::get('/','Admin\DashboardController@index');
    //Admin Dashboard
    Route::prefix('dashboard')->name('.dashboard')->group(function () {

        Route::get('/notifications','Admin\DashboardController@notification')->name('.notification');
        Route::get('/notifications/read/{id}/{flag}','Admin\DashboardController@notificationRead')->name('.notification.read');
        //Dashboard User -- admin.dashboard.user
        Route::prefix('/user')->name('.user')->group(function () {
            Route::get('/', 'Admin\UserController@index')->name('.index');
            Route::get('/create', 'Admin\UserController@create')->name('.create');
            Route::post('/store', 'Admin\UserController@store')->name('.store');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('.edit');
            Route::put('/update/{id}', 'Admin\UserController@update')->name('.update');
            Route::delete('/destroy/{id}', 'Admin\UserController@destroy')->name('.destroy');
        });
        //Dashboard Admin -- admin.dashboard.user
        Route::prefix('/admin')->name('.admin')->group(function () {
            Route::get('/', 'Admin\AdminController@index')->name('.index');
            Route::get('/create', 'Admin\AdminController@create')->name('.create');
            Route::post('/store', 'Admin\AdminController@store')->name('.store');
            Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('.edit');
            Route::put('/update/{id}', 'Admin\AdminController@update')->name('.update');
            Route::delete('/destroy/{id}', 'Admin\AdminController@destroy')->name('.destroy');
        });

        //Dashboard Product -- admin.dashboard.product
        Route::prefix('/product')->name('.product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('.index');
            Route::get('/create', 'Admin\ProductController@create')->name('.create');
            Route::get('/edit/{slug}', 'Admin\ProductController@edit')->name('.edit');
            Route::get('/type-size/{product_type}', 'Vendor\ProductController@typeSize')->name('product.type_size');
            Route::get('/init-type-size/{product_id}', 'Vendor\ProductController@initTypeSize')->name('product.init_type_size');
        });

        //Dashboard Product -- admin.dashboard.banner
        Route::prefix('/banner')->name('.banner')->group(function () {
            Route::get('/', 'Admin\BannerController@index')->name('.index');
            Route::get('/create', 'Admin\BannerController@create')->name('.create');
            Route::post('/store', 'Admin\BannerController@store')->name('.store');
            Route::get('/edit/{id}', 'Admin\BannerController@edit')->name('.edit');
            Route::post('/{id}/update', 'Admin\BannerController@update')->name('.update');
            Route::delete('/{id}/delete', 'Admin\BannerController@destroy')->name('.destroy');
        });

        //Dashboard Order -- admin.dashboard.order
        Route::prefix('/order')->name('.order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('.index');
            Route::get('/show/{id}', 'Admin\OrderController@show')->name('.show');
            Route::get('/refund/{id}', 'Admin\OrderController@refund')->name('.refund');
            Route::get('/cancel/{id}', 'Admin\OrderController@cancel')->name('.cancel');
            Route::post('/dispatched/{id}', 'Admin\OrderController@dispatched')->name('.dispatched');
            Route::post('/{id}/update/tracking', 'Admin\OrderController@updateTracking')->name('.update.tracking');
        });

        //Dashboard Category -- admin.dashboard.category
        Route::prefix('/category')->name('.category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('.create');
            Route::get('/edit/{slug}', 'Admin\CategoryController@edit')->name('.edit');
            Route::post('/update/{slug}', 'Admin\CategoryController@update')->name('.update');
            Route::get('/show/{slug}', 'Admin\CategoryController@show')->name('.show');

            Route::get('/parent/{name}', 'Admin\CategoryController@parent')->name('.parent');
            Route::get('/sub_parent/{name}', 'Admin\CategoryController@sub_parent')->name('.parent.sub');
        });

        //Dashboard Vendor -- admin.dashboard.vendor
        Route::prefix('/vendor')->name('.vendor')->group(function () {
            Route::get('/', 'Admin\VendorController@index')->name('.index');
            Route::get('/create', 'Admin\VendorController@create')->name('.create');
            Route::post('/store', 'Admin\VendorController@store')->name('.store');
            Route::get('/edit/{id}', 'Admin\VendorController@edit')->name('.edit');
            Route::put('/update/{id}', 'Admin\VendorController@update')->name('.update');
            Route::delete('/destroy/{id}', 'Admin\VendorController@destroy')->name('.destroy');

            //Request Vendor
            Route::get('/request', 'Admin\VendorController@vendorRequest')->name('.request');
            Route::get('/request/{id}/accept', 'Admin\VendorController@vendorRequestAccept')->name('.request.accept');
            Route::get('/request/{id}/reject', 'Admin\VendorController@vendorRequestReject')->name('.request.reject');
        });

        //Dashboard Vendor -- admin.dashboard.dispatch
        Route::prefix('/dispatch')->name('.dispatch')->group(function () {
            Route::get('/', 'Admin\DispatchController@index')->name('.index');
            Route::get('/confirm/{id}', 'Admin\DispatchController@confirm')->name('.confirm');
        });

        //Dashboard Career -- admin.dashboard.career
        Route::prefix('/career')->name('.career')->group(function () {
            Route::get('/', 'Admin\CareerController@index')->name('.index');
            Route::get('/create', 'Admin\CareerController@create')->name('.create');
            Route::post('/store', 'Admin\CareerController@store')->name('.store');
            Route::get('/edit/{id}', 'Admin\CareerController@edit')->name('.edit');
            Route::post('/update/{id}', 'Admin\CareerController@update')->name('.update');
            Route::delete('/destroy/{id}', 'Admin\CareerController@destroy')->name('.destroy');

            Route::get('/applications', 'Admin\CareerController@application')->name('.application');
        });

        //Manage Fulfillment
        Route::prefix('/ordermanagement')->name('.ordermanagement')->group(function(){
            Route::get('/','Admin\OrderManagementController@index')->name('.index');
            Route::get('/shipped','Admin\OrderManagementController@shipped')->name('.shipped');
            Route::get('/Acknowledged','Admin\OrderManagementController@acknowledged')->name('.acknowledged');
            Route::get('/canceled','Admin\OrderManagementController@canceled')->name('.canceled');
            //Route::post('/{id}', 'Vendor\OrderManagementController@store')->name('.store');
            Route::get('/{id}/show', 'Admin\OrderManagementController@show')->name('.show');
            Route::post('/{id}/delivered', 'Admin\OrderManagementController@delivered')->name('.delivered');            
            Route::post('/{id}/cancel-transaction', 'Admin\OrderManagementController@cancel_transaction')->name('.canceltransaction');            
        });

    });
});


/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
*/
//Vendor Login
Route::get('/vendor/login','Admin\AuthController@login')->name('vendor.login');

Route::prefix('vendor')->name('vendor')->middleware(['auth:sanctum','can:isVendor'])->group(function () {

    Route::get('/','Vendor\DashboardController@index');
    //Admin Dashboard
    Route::prefix('/dashboard')->name('.dashboard')->group(function () {

        //Dashboard Product -- vendor.dashboard.product
        Route::prefix('/product')->name('.product')->group(function () {
            Route::get('/', 'Vendor\ProductController@index')->name('.index');
            Route::get('/create', 'Vendor\ProductController@create')->name('.create');
            Route::post('/store', 'Vendor\ProductController@store')->name('.store');
            Route::get('/edit/{slug}', 'Vendor\ProductController@edit')->name('.edit');
            Route::put('/update/{slug}', 'Vendor\ProductController@update')->name('.update');
            Route::delete('/destroy/{slug}', 'Vendor\ProductController@destroy')->name('.destroy');

            Route::get('/active/{slug}', 'Vendor\ProductController@active')->name('.active');
            Route::get('/type-size/{product_type}', 'Vendor\ProductController@typeSize')->name('product.vendor.type_size');
        });

        //Dashboard Category -- vendor.dashboard.order
        Route::prefix('/order')->name('.order')->group(function () {
            Route::get('/', 'Vendor\OrderController@index')->name('.index');
            Route::get('/send/{id}', 'Vendor\OrderController@send')->name('.send');
            Route::post('/send/{id}/store', 'Vendor\OrderController@store')->name('.store');
            Route::get('/dispatched/{id}', 'Vendor\OrderController@dispatched')->name('.dispatched');
            Route::get('/dispatch', 'Vendor\OrderController@indexDispatch')->name('.index.dispatch');
        });
        //Manage Fulfillment
        Route::prefix('/ordermanagement')->name('.ordermanagement')->group(function(){
            Route::get('/','Vendor\OrderManagementController@index')->name('.index');
            Route::post('/{id}', 'Vendor\OrderManagementController@store')->name('.store');
            Route::get('/{id}/show', 'Vendor\OrderManagementController@show')->name('.show');
            Route::get('/shipping-info', 'Vendor\OrderManagementController@shipping')->name('.shipping');            

        });
        //Dashboard Bank -- vendor.dashboard.bank
        Route::prefix('/bank')->name('.bank')->group(function () {
            Route::get('/', 'Vendor\BankController@index')->name('.index');
            Route::get('/transfers', 'Vendor\BankController@transfers')->name('.transfer');
            Route::post('/onboard-user', 'Vendor\BankController@new')->name('.new');
            Route::get("/stripe-connected", "Vendor\BankController@stripeConnected");
        });

        //Dashboard TypeSize, Size and Color Options
        //Route::resource('/type-size', [])
        Route::get('/category/parent/{name}', 'Vendor\ProductController@parent')->name('category.parent');

//        //Dashboard Category -- vendor.dashboard.order
//        Route::prefix('/order')->name('.order')->group(function () {
//            Route::get('/', 'Vendor\OrderController@index')->name('.index');
//            Route::get('/show/{id}', 'Vendor\OrderController@show')->name('.show');
//            Route::get('/cancel/{id}', 'Vendor\OrderController@cancel')->name('.cancel');
//            Route::get('/dispatched/{id}', 'Vendor\OrderController@dispatched')->name('.dispatched');
//        });
    });
});
/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::resource('/category','Product\CategoryController');


/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/product/{main}/{category}/{slug}','Product\ProductController@show')->name('products.show');
Route::resource('/product','Product\ProductController');
Route::get('/product/type-size','Product\ProductController@typeSize');
Route::get('/product/featured/{featured}','Product\ProductController@featured');
Route::get('/product-search','Product\ProductController@search');
/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::get('/cart','User\CartController@index')->name('cart.index');
Route::get('/cart/empty','User\CartController@empty')->name('cart.empty');
Route::get('/cart/shipping','User\CartController@shipping')->name('cart.shipping');
Route::post('/cart/store','User\CartController@store')->name('cart.store');
Route::get('/cart/{id}','User\CartController@destroy')->name('cart.destroy');
Route::get('/cart/saveForLater/{id}', 'User\CartController@saveForLater')->name('cart.saveForLater');
Route::get('/cart/saveForLaterDetail/{product_id}', 'User\CartController@saveForLaterDetail')->name('cart.saveForLaterDetail');
Route::get('/cart/destroy/saveForLater/{id}', 'User\CartController@destroy_saveForLater')->name('cart.saveForLater.destroy');

//Checkout Routes
Route::post('/checkout','User\CheckoutController@index')->name('checkout.index');
Route::post('/checkout/store', 'User\CheckoutController@store')->name('checkout.store');

/*
|--------------------------------------------------------------------------
| Other Routes
|--------------------------------------------------------------------------
*/

Route::get('/main/{main}','PagesController@main')->name('main');
Route::get('/category/{main}/{p_name}/{name}','PagesController@child')->name('category.child');
Route::get('/search-child/{main}/{p_name}/{name}','PagesController@searchChild')->name('category.searchChild');
Route::get('/sell-on-spree','PagesController@sellOnSpree')->name('footer.sellOnSpree');
Route::get('/sell-on-spree/form','PagesController@sellOnSpree_form')->name('sellOnSpree.form');
Route::post('/sell-on-spree/form/submit','PagesController@sellOnSpree_formSubmit')->name('sellOnSpree.form.submit');
Route::get('/contact-us','PagesController@contact_us')->name('contact_us');

Route::get('/search','PagesController@search')->name('search');

Route::get('/careers','PagesController@career')->name('career');
Route::get('/careers/{category}','PagesController@career_category')->name('career.category');
Route::get('/careers/job/{id}','PagesController@career_apply')->name('career.apply');
Route::post('/careers/job/{id}/apply','PagesController@career_apply_store')->name('career.apply.store');
Route::post('/job/search/{category}','PagesController@searchJob')->name('job.search');


Route::get('/kitchen','PagesController@kitchen')->name('kitchen');
Route::get('/kitchen-partner/form','PagesController@kitchenPartner_form')->name('kitchen.partner.form');
Route::post('/kitchen-partner/form/submit','PagesController@kitchenPartner_formSubmit')->name('kitchen.partner.form.submit');
