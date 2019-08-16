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

    //route liệt kê danh sách category
    Route::get('news', 'Backend\NewsController@index');
    //route thêm category
    Route::get('news/create', 'Backend\NewsController@create');
    //route xử lý submit form khi thêm mới category
    Route::post('news/store', 'Backend\NewsController@store');
    //route trang chi tiết category
    Route::get('news/detail/{id}', 'Backend\NewsController@detail');
    //route form edit category
    Route::post('news/edit/{id}', 'Backend\NewsController@edit');
    //route xử lý submit form edit
    Route::get('news/update/{id}', 'Backend\NewsController@update');
    //route delete category
    Route::get('news/delete/{id}', 'Backend\NewsController@delete');

    Route::any('login', 'Backend\AdminController@login');
});



//frontend
Route::get('/', 'Frontend\HomeController@index');
