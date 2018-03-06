<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');




//Route::get('companies', 'CompanyController@index')->middleware('auth:api', 'App\Http\Middleware\AdminMiddleware');

Route::group(['middleware' => ['auth:api', 'App\Http\Middleware\AdminMiddleware']], function() {
    //for company table
    Route::get('companies', 'CompanyController@index');
    Route::get('companies/{company}', 'CompanyController@show');
    Route::post('companies', 'CompanyController@store');
    Route::put('companies/{company}', 'CompanyController@update');
    Route::delete('companies/{company}', 'CompanyController@delete');


//for category table
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{category}', 'CategoryController@show');
    Route::post('categories', 'CategoryController@store');
    Route::put('categories/{category}', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@delete');


//for product table
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::put('products/{product}', 'ProductController@update');
    Route::delete('products/{product}', 'ProductController@delete');

//for customer table
    Route::get('customers', 'CustomerController@index');
    Route::get('customers/{customer}', 'CustomerController@show');
    Route::post('customers', 'CustomerController@store');
    Route::put('customers/{customer}', 'CustomerController@update');
    Route::delete('customers/{customer}', 'CustomerController@delete');


//for reviews table
    Route::get('reviews', 'ReviewController@index');
    Route::get('reviews/{review}', 'ReviewController@show');
    Route::post('reviews', 'ReviewController@store');
    Route::put('reviews/{review}', 'ReviewController@update');
    Route::delete('reviews/{review}', 'ReviewController@delete');


//for Shopping Cart table
    Route::get('shoppingcarts', 'ShoppingCartController@index');
    Route::get('shoppingcarts/{shoppingcart}', 'ShoppingCartController@show');
    Route::post('shoppingcarts', 'ShoppingCartController@store');
    Route::put('shoppingcarts/{shoppingcart}', 'ShoppingCartController@update');
    Route::delete('shoppingcarts/{shoppingcart}', 'ShoppingCartController@delete');


//for Cart Items table
    Route::get('cartitems', 'CartItemController@index');
    Route::get('cartitems/{cartitem}', 'CartItemController@show');
    Route::post('cartitems', 'CartItemController@store');
    Route::put('cartitems/{cartitem}', 'CartItemController@update');
    Route::delete('cartitems/{cartitem}', 'CartItemController@delete');


//for Order table
    Route::get('orders', 'OrderController@index');
    Route::get('orders/{order}', 'OrderController@show');
    Route::post('orders', 'OrderController@store');
    Route::put('orders/{order}', 'OrderController@update');
    Route::delete('orders/{order}', 'OrderController@delete');

//for Order Details table
    Route::get('orderdetails', 'OrderDetailController@index');
    Route::get('orderdetails/{orderdetail}', 'OrderDetailController@show');
    Route::post('orderdetails', 'OrderDetailController@store');
    Route::put('orderdetails/{orderdetail}', 'OrderDetailController@update');
    Route::delete('orderdetails/{orderdetail}', 'OrderDetailController@delete');
});







