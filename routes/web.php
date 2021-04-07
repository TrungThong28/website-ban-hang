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
@include ('route_admin.php');

//Route cho trang chu
Route::get('/', 'Home\ShopController@index')->name('get.home');

//Route trang danh sach gio hang
Route::get('/gio-hang-cua-ban', 'Home\ShopController@getListCart')->name('get.listCart');

//Route cho phan thanh toan don hang
Route::post('/thanh-toan', 'Home\ShopController@postToPay')->name('post.toPay');



//Route cho trang danh muc san pham
Route::get('/{slug}', 'Home\ShopController@categoryProducts')->name('get.categoryProducts');

//Route cho trang chi tiet san pham
Route::get('/{category}/{slug}/{id}', 'Home\ShopController@getProduct')->name('get.getProduct');

//Route cho trang chi tiet bai viet
Route::get('/tin-tuc/{slug}_{id}', 'Home\ShopController@articleDetail')->name('get.articleDetail');

//Route gio hang
Route::get('/them-gio-hang/{id}', 'Home\ShopController@getAddCart')->name('get.addCart');

//xoa cart
Route::get('/xoa-san-pham/{rowId}', 'Home\ShopController@getDeleteCart')->name('get.deleteCart');

//cap nhat so luong trong gio hang
Route::post('/cap-nhat/{rowId}', 'Home\ShopController@postUpdateCart')->name('post.updateCart');

//Route error home page
Route::get('404',['as'=>'404','uses'=>'Home\ErrorController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'Home\ErrorController@errorCode405']);

