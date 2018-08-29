<?php

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

/*Route::get('/', function () {
    return view('index');
});*/

/*Route::get('/shop', function () {
    return view('shop');
});*/
Auth::routes();

Route::get('/', 'LandingPageController@index');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/product/{product}', 'ShopController@show')->name('shop.show');
Route::get('/searchproduct','ShopController@search')->name('search.product');

Route::get('aboutus', function () {
    return view('aboutus');
});
Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function()
{
    Route::get('/clearcart', 'ShopController@clearcart')->name('shop.clearcart');

    Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
    Route::post('/cart', 'CartController@store')->name('cart.store')->middleware('auth');
    Route::patch('/cart/{product}', 'CartController@update')->name('cart.update')->middleware('auth');
    Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
    Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');



    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/order', 'OrderHistoryController@index')->name('order')->middleware('auth');
    Route::delete('/order/{bulkid}', 'OrderHistoryController@show')->name('order.show')->middleware('auth');


    Route::post('/review', 'ReviewController@index')->name('review.index');
    Route::post('/follow', 'FollowController@index')->name('follow.index')->middleware('auth');
    Route::get('timeline', 'FollowController@show')->middleware('auth');
    Route::delete('/follow/{product}', 'FollowController@destroy')->name('follow.destroy')->middleware('auth');


});


Route::group(['middleware' => 'App\Http\Middleware\VendorMiddleware'], function()
{
    Route::get('/vendorhomepage', 'CompanyController@webindex')->name('vendor.home')->middleware('auth');
    Route::get('/vendorproductedit/{id}', 'CompanyController@webupdate')->name('vendor.edit')->middleware('auth');
    Route::patch('/vendorupdate/{id}', 'CompanyController@vendorupdate')->name('vendor.update')->middleware('auth');
    Route::get('/vendorproductadd', 'CompanyController@webaddproduct')->name('add.product')->middleware('auth');
    Route::post('/vendornewproduct', 'CompanyController@webnewproduct')->name('vendor.newproduct')->middleware('auth');
    Route::delete('/vendordestroy/{id}', 'CompanyController@destroy')->name('vendor.destroy')->middleware('auth');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
