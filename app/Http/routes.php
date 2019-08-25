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
Route::group(['prefix' => 'admin'], function () {
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

    //route liệt kê danh sách quyền
    Route::get('roles', 'Backend\RoleController@index');
    //route thêm quyền
    Route::get('roles/create', 'Backend\RoleController@create');
    //route xử lý submit form khi thêm mới quyền
    Route::post('roles/store', 'Backend\RoleController@store');
    //route trang chi tiết quyền
    Route::get('roles/detail/{id}', 'Backend\RoleController@detail');
    //route form edit quyền
    Route::post('roles/edit/{id}', 'Backend\RoleController@edit');
    //route xử lý submit form edit
    Route::get('roles/update/{id}', 'Backend\RoleController@update');
    //route delete product
    Route::get('roles/delete/{id}', 'Backend\RoleController@delete');

    //route liệt kê danh admin
    Route::get('index', 'Backend\AdminController@index');
    //route thêm admin
    Route::get('admins/create', 'Backend\AdminController@create');
    //route xử lý submit form khi thêm mới admin
    Route::post('admins/store', 'Backend\AdminController@store');
    //route trang chi tiết admin
    Route::get('admins/detail/{id}', 'Backend\AdminController@detail');
    //route form edit admin
    Route::post('admins/edit/{id}', 'Backend\AdminController@edit');
    //route xử lý submit form edit
    Route::get('admins/update/{id}', 'Backend\AdminController@update');
    //route delete product
    Route::get('admins/delete/{id}', 'Backend\AdminController@delete');

    //route liệt kê danh mục tin tức
    Route::get('category', 'Backend\CategoryController@index');
//route thêm danh mục tin tức
    Route::get('category/create', 'Backend\CategoryController@create');
//route xử lý submit form khi thêm mới danh mục tin tức
    Route::post('category/store', 'Backend\CategoryController@store');
//route trang chi tiết danh mục tin tức
    Route::get('category/detail/{id}', 'Backend\CategoryController@detail');
//route form edit news
    Route::post('category/edit/{id}', 'Backend\CategoryController@edit');
//route xử lý submit form edit
    Route::get('category/update/{id}', 'Backend\CategoryController@update');
//route delete category
    Route::get('category/delete/{id}', 'Backend\CategoryController@delete');

//route liệt kê danh sách news
    Route::get('news', 'Backend\NewsController@index');
//route thêm news
    Route::get('news/create', 'Backend\NewsController@create');
//route xử lý submit form khi thêm mới news
    Route::post('news/store', 'Backend\NewsController@store');
//route trang chi tiết news
    Route::get('news/detail/{id}', 'Backend\NewsController@detail');
//route form edit news
    Route::post('news/edit/{id}', 'Backend\NewsController@edit');
//route xử lý submit form edit
    Route::get('news/update/{id}', 'Backend\NewsController@update');
//route delete category
    Route::get('news/delete/{id}', 'Backend\NewsController@delete');

    Route::any('login', 'Backend\AdminController@login');
    Route::any('logout', 'Backend\AdminController@logout');

});


//frontend
Route::get('/', 'Frontend\HomeController@index');
