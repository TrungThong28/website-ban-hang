<?php

//Route laravel file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['checkLogin']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

//Route admin
Route::group(['prefix'=>'quan-tri', 'as' => 'quan-tri.', 'middleware' => 'checkLogin'], function() {

	// Route cho bang dieu khien
	Route::get('/', 'Admin\AdminController@index')->name('bang-dieu-khien');

	//Route quan ly quan tri vien
	Route::resource('nguoi-su-dung', 'Admin\UserController')->middleware('role');
	Route::post('nguoi-su-dung/cap-nhat','Admin\UserController@assign_roles')->name('nguoi-su-dung.cap-nhat');

	//Route cho muc Category
	Route::resource('danh-muc', 'Admin\CategoryController')->middleware('role');

	//Route cho muc san pham
	Route::resource('san-pham', 'Admin\ProductController')->middleware('role');

	//Route cho muc thuong hieu
	Route::resource('thuong-hieu', 'Admin\BrandController')->middleware('role');

	//Route cho muc thuong hieu
	Route::resource('nha-cung-cap', 'Admin\VendorController')->middleware('role');

	//Route cho muc anh bia
	Route::resource('anh-bia', 'Admin\BannerController')->middleware('role');

	//Route cho muc bai viet tin tuc
	Route::resource('tin-tuc', 'Admin\ArticleController');

	//Route cho trang thong tin khach hang thanh toan
	Route::resource('khach-hang-thanh-toan', 'Admin\CustomerInvoiceController')->middleware('role');

	//Route cho trang san pham thanh toan
	Route::resource('san-pham-thanh-toan', 'Admin\InvoiceController')->middleware('role');

});

//Route login
Route::get('/quan-tri/dang-nhap', 'Admin\AdminController@login')->name('dang-nhap');
Route::post('/quan-tri/gui-dang-nhap', 'Admin\AdminController@postLogin')->name('gui-dang-nhap');

// Trang Logout
Route::get('dang-xuat', 'Admin\AdminController@logout')->name('dang-xuat');

//Route kich hoat hoac An phan danh muc
Route::get('kich-hoat/{id}', 'Admin\CategoryController@active')->name('active');
Route::get('an/{id}', 'Admin\CategoryController@unactive')->name('unactive');

//Route kich hoat hoac An phan nguoi su dung
Route::get('nguoi-su-dung/kich-hoat/{id}', 'Admin\UserController@active')->name('nguoi-su-dung.active');
Route::get('nguoi-su-dung/an/{id}', 'Admin\UserController@unactive')->name('nguoi-su-dung.unactive');

//Route kich hoat hoac An phan san pham
Route::get('san-pham/kich-hoat/{id}', 'Admin\ProductController@active')->name('san-pham.active');
Route::get('san-pham/an/{id}', 'Admin\ProductController@unactive')->name('san-pham.unactive');


?>