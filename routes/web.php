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
//Front End Route


Route::get('/', 'FrontendController@index');
Route::get('/about', 'FrontendController@about');
Route::get('/contuct', 'FrontendController@contuct'); 
Route::post('/contact/insert/form', 'FrontendController@contuctinsert'); 



Auth::routes();

Route::get('/home', 'HomeController@frontindex')->name('home');
Route::get('/home', 'OurController@about');
Route::get('/about/delete/{id}', 'OurController@deleteabout');
Route::get('/our/product/view', 'ProductController@product');
Route::post('/our/product/insert', 'ProductController@insert');
Route::get('/our/product/delete/{id}', 'ProductController@deleteproduct');
Route::get('/our/product/edit/{id}', 'ProductController@editproduct');
Route::post('/our/product/edit', 'ProductController@oureditproduct');
Route::get('/our/product/restore/{id}', 'ProductController@restoreproduct');
Route::get('/our/product/forcedelete/{id}', 'ProductController@forcedeleteproduct');


Route::get('/our/category/view', 'CategoryController@addcategoty');
Route::post('/our/category/insert', 'CategoryController@addcategotyinsert');
Route::get('/contact/message/view', 'HomeController@contactmessageview');
Route::get('change/menu/status/{id}', 'HomeController@changemenustatus');


//Front End Route

Route::get('product/details/{id}', 'FrontendController@productdetails');
Route::get('category/wise/product/{category_id}', 'FrontendController@categorywiseproduct');
Route::get('add/to/card/{id}', 'FrontendController@addtocard');
Route::get('/card/page', 'FrontendController@cardpage');
Route::get('/delete/form/card/{card_id}', 'FrontendController@deleteformcard');