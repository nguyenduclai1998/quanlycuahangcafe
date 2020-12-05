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

Route::group(['namespace' => 'Dashboard\Auth'], function() {
	Route::get('login', 'LoginController@getLogin')->name('get.login');
	Route::post('login', 'LoginController@postLogin')->name('post.login');
	Route::get('logout', 'LoginController@getLogout')->name('get.logout');
});

Route::group(['prefix' => '', 'namespace' => 'Dashboard'], function() {
	Route::middleware(['auth'])->group(function() {
		Route::get('', 'HomeController@index')->name('home');
		Route::post('statistical', 'HomeController@statistical')->name('statistical');

		Route::get('quan-ly-thuc-don.html', 'MenuManagerController@getMenu')->name('get.menu');
		Route::post('them-moi-thuc-don', 'MenuManagerController@createMenu')->name('post.create.menu');
		Route::post('sua-thuc-don-{idmMenu}', 'MenuManagerController@updateMenu')->name('post.update.menu');
		Route::get('xoa-thuc-don-{idmMenu}', 'MenuManagerController@deleteMenu')->name('get.delete.menu');

		Route::get('quan-ly-ban.html', 'TableManagerController@getTable')->name('get.table');
		Route::post('them-moi-ban', 'TableManagerController@createTable')->name('post.create.table');
		Route::post('sua-ban-{idTable}', 'TableManagerController@updateTable')->name('post.update.table');
		Route::get('xoa-ban-{idTable}', 'TableManagerController@deleteTable')->name('get.delete.table');

		Route::get('quan-ly-nhan-vien.html', 'UserController@getUsers')->name('get.users');
		Route::post('them-moi-nhan-vien', 'UserController@createUser')->name('post.create.user');
		Route::post('sua-nhan-vien-{idUser}', 'UserController@updateUser')->name('post.update.user');

		Route::get('quan-ly-nha-cung-cap.html', 'ManageSuppierController@getSupplier')->name('get.supplier');
		Route::post('them-moi-nha-cung-cap', 'ManageSuppierController@createSupplier')->name('post.create.supplier');
		Route::post('sua-nha-cung-cap-{idSupplier}', 'ManageSuppierController@updateSupplier')->name('post.update.supplier');
		Route::get('xoa-nha-cung-cap-{idSupplier}', 'ManageSuppierController@deleteSupplier')->name('get.delete.supplier');

		Route::get('quan-ly-hang-hoa.html', 'ManageMatterialController@getMatterial')->name('get.matterial');
		Route::post('them-moi-hang-hoa', 'ManageMatterialController@createMatterial')->name('post.create.matterial');
		Route::post('sua-hang-hoa-{idMatterial}', 'ManageMatterialController@updateMatterial')->name('post.update.matterial');
		Route::get('xoa-hang-hoa-{idMatterial}', 'ManageMatterialController@deleteMatterial')->name('get.delete.matterial');

		Route::get('quan-ly-phieu-nhap-kho.html', 'GoodDeliveryNoteController@getGoodDeliveryNote')->name('get.goodDeliveryNote');
		Route::post('them-moi-phieu-nhap-kho', 'GoodDeliveryNoteController@createGoodDeliveryNote')->name('post.create.goodDeliveryNote');
		Route::post('sua-phieu-nhap-kho-{goodDeliveryNoteId}', 'GoodDeliveryNoteController@updateGoodDeliveryNote')->name('post.update.goodDeliveryNote');
		Route::get('xoa-phieu-nhap-kho-{goodDeliveryNoteId}', 'GoodDeliveryNoteController@deleteGoodDeliveryNote')->name('get.delete.goodDeliveryNote');
		Route::get('chi-tiet-phieu-nhap-kho-{goodDeliveryNoteId}.html', 'GoodDeliveryNoteController@getDetail')->name('get.goodDeliveryNoteDetail');

		Route::get('lap-hoa-don-ban-hang.html', 'SalesManagerController@getBillOfSale')->name('get.billofsale');
		Route::get('them-moi-hoa-don-ban-hang.html', 'SalesManagerController@createBillOfSale')->name('create.billofsale');
		Route::post('luu-hoa-don-ban-hang', 'SalesManagerController@storeBillOfSale')->name('store.billofsale');
		Route::get('sua-hoa-don-ban-hang-{id}.html', 'SalesManagerController@editBillOfSale')->name('edit.billofsale');
		Route::post('cap-nhat-don-ban-hang-{id}.html', 'SalesManagerController@updateBillOfSale')->name('update.billofsale');
		Route::get('xoa-don-don-hang-{id}.html', 'SalesManagerController@deleteBillOfSale')->name('delete.billofsale');
		Route::get('xem-chi-tiet-don-hang-{id}.html', 'SalesManagerController@getBillDetal')->name('getDetail.billofsale');

		Route::get('phuc-vu-do-uong.html', 'ServeDinksController@getBill')->name('get.servedinks');
		Route::get('cap-nhat-trang-thai-{status}-{id}.html', 'ServeDinksController@updateStatus')->name('updateStatus.servedinks');
	});
});

