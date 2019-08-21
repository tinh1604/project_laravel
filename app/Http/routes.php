<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//backend
Route::group(['prefix' => 'admin'], function() {
    //route liệt kê danh sách product_category
    Route::get('product_category', 'Backend\ProductCategoryController@index');
    //route thêm category
    Route::get('product_category/create', 'Backend\ProductCategoryController@create');
    //route xử lý submit form khi thêm mới category
    Route::post('product_category/store', 'Backend\ProductCategoryController@store');
    //route trang chi tiết category
    Route::get('product_category/detail/{id}', 'Backend\ProductCategoryController@detail');
    //route form edit category
    Route::post('product_category/edit/{id}', 'Backend\ProductCategoryController@edit');
    //route xử lý submit form edit
    Route::get('product_category/update/{id}', 'Backend\ProductCategoryController@update');
    //route delete category
    Route::get('product_category/delete/{id}', 'Backend\ProductCategoryController@delete');

    //route liệt kê danh sách sản phẩm
    Route::get('product', 'Backend\ProductController@index');
    //route thêm product
    Route::get('product/create', 'Backend\ProductController@create');
    //route xử lý submit form khi thêm mới product
    Route::post('product/store', 'Backend\ProductController@store');
    //route trang chi tiết product
    Route::get('product/detail/{id}', 'Backend\ProductController@detail');
    //route form edit product
    Route::post('product/edit/{id}', 'Backend\ProductController@edit');
    //route xử lý submit form edit
    Route::get('product/update/{id}', 'Backend\ProductController@update');
    //route delete product
    Route::get('product/delete/{id}', 'Backend\ProductController@delete');

    Route::any('login', 'Backend\AdminController@login');
});



//frontend
Route::get('/', 'Frontend\HomeController@index');
