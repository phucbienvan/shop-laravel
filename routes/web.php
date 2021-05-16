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
