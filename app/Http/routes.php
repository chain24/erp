
<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('category.index');
});

Route::get('customer/product',['as'=>'customer.product','uses'=>'CustomerController@showproduct'] );

Route::resource('category', 'CategoryController');
Route::resource('location', 'LocationController');
Route::resource('product', 'ProductController');
Route::resource('supplier', 'SuppliersController');
Route::resource('customer', 'CustomerController');
Route::resource('order', 'OrdersController');
Route::resource('sell', 'SellsController');
Route::resource('sn', 'SnController');

Route::get('supplier/select',['as'=>'supplier.select','uses'=>'SuppliersController@showorder'] );
Route::get('location/select',['as'=>'location.select','uses'=>'LocationController@show'] );
Route::get('product/select',['as'=>'product.select','uses'=>'ProductController@showorder'] );
Route::get('order/select',['as'=>'order.select','uses'=>'OrderController@show'] );
Route::post('ajax/create', 'AjaxController@store');






