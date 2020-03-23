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

//use Illuminate\Routing\Route;

Auth::routes();

Route::group(['namespace'=>'Parts'], function () {
    Route::get('/','SiteController@index')->name('parts.index');
    Route::post('/','SiteController@search')->name('parts.search');
});

Route::group(['namespace'=>'Cart','prefix'=>'cart','middleware'=>'cart'], function(){
    Route::post('/getcart','CartController@getcart')->name('getcart');
    Route::post('/appendcart/{id}', 'CartController@append')->name('cart.append');
    Route::post('removecart/{id}', 'CartController@remove')->name('cart.remove');
});


Route::get('/main','TestController@index')->name('test.index');
Route::post('/addcomment','TestController@addcomment')->name('test.addcomment');
Route::get('/getform','TestController@getCommentForm')->name('test.getform');
