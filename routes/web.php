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

Route::get('/',[
    'as'=>'home',
    'uses'=>'PageController@getIndex'
]);

// trang chu
Route::get('/index',[
    'as'=>'home',
    'uses'=>'PageController@getIndex'
]);

//danh muc san pham
Route::get('/category/{type}', [
    'as'=>'category',
    'uses'=>'PageController@getCategory'
]);

// chi tiet san pham
Route::get('/product/{id}', [
    'as'=>'product',
    'uses'=>'PageController@getProduct'
]);

//lien he
Route::get('/contact', [
    'as'=>'contact',
    'uses'=>'PageController@getContact'
]);

// gioi thieu
Route::get('/about', [
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);

//them san pham vao gio hang
Route::get('/add-to-cart/{id}', [
    'as'=>'add-to-cart',
    'uses'=>'PageController@getAddToCart'
]);
//  xoa san pham khoi gio hang
Route::get('/delete-cart/{id}', [
    'as'=>'delete-cart',
    'uses'=>'PageController@getDeleteCart'
]);
//  checkout
Route::get('/checkout', [
    'as'=>'checkout',
    'uses'=>'PageController@getCheckout'
]);
Route::post('/checkout', [
    'as'=>'checkout',
    'uses'=>'PageController@postCheckout'
]);

// Dang nhap
Route::get('/login', [
    'as'=>'login_customer',
    'uses'=>'PageController@getLoginCustomer'
]);

// Dang ki
Route::get('/register', [
    'as'=>'register_customer',
    'uses'=>'PageController@getRegisterCustomer'
]);

//  ADMIN
//  Admin
Route::get('/admin/login', 'AdminController@getLoginAdmin')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLoginAdmin')->name('admin.login');
Route::get('/admin/logout', 'AdminController@getLogoutAdmin')->name('admin.logout');


Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function (){
    Route::get('/', 'AdminController@index');
    // Danh muc
    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'AdminController@index')->name('category.list');
        Route::get('list', 'CategoryController@getList')->name('category.list');
        Route::get('edit/{id}', 'CategoryController@getEdit')->name('category.edit');
        Route::post('edit/{id}', 'CategoryController@postEdit')->name('category.edit');
        Route::get('add', 'CategoryController@getAdd')->name('category.add');
        Route::post('add', 'CategoryController@postAdd')->name('category.add');
        Route::get('delete/{id}', 'CategoryController@getDelete')->name('category.delete');

    });

    // product
    Route::group(['prefix'=>'product'], function(){
        Route::get('list', 'ProductController@getList')->name('product.list');
        Route::get('edit/{id}', 'ProductController@getEdit')->name('product.edit');
        Route::post('edit/{id}', 'ProductController@postEdit')->name('product.edit');
        Route::get('add', 'ProductController@getAdd')->name('product.add');
        Route::post('add', 'ProductController@postAdd')->name('product.add');
        Route::get('delete/{id}', 'ProductController@getDelete')->name('product.delete');

    });


    // Slide
    Route::group(['prefix'=>'slide'], function(){
        Route::get('list', 'SlideController@getList')->name('slide.list');
        Route::get('edit/{id}', 'SlideController@getEdit')->name('slide.edit');
        Route::post('edit/{id}', 'SlideController@postEdit')->name('slide.edit');
        Route::get('add', 'SlideController@getAdd')->name('slide.add');
        Route::post('add', 'SlideController@postAdd')->name('slide.add');
        Route::get('delete/{id}', 'SlideController@getDelete')->name('slide.delete');

    });

    // User
    Route::group(['prefix'=>'user'], function(){
        Route::get('list', 'UserController@getList')->name('user.list');

        Route::get('edit/{id}', 'UserController@getEdit')->name('user.edit');
        Route::post('edit/{id}', 'UserController@postEdit')->name('user.edit');

        Route::get('add', 'UserController@getAdd')->name('user.add');
        Route::post('add', 'UserController@postAdd')->name('user.add');

        Route::get('delete/{id}', 'UserController@getDelete')->name('user.delete');


    });
});
