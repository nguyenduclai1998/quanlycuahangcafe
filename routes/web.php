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
});

Route::group(['prefix' => '', 'namespace' => 'Dashboard'], function() {
	Route::middleware(['auth'])->group(function() {
		Route::get('', function() {
			return view('layouts.app_master_dashboard');
		})->name('home');

		Route::get('quan-ly-thuc-don', 'MenuManagerController@getMenu')->name('get.menu');
		Route::post('them-moi-thuc-don', 'MenuManagerController@createMenu')->name('post.create.menu');
		Route::post('sua-thuc-don/{idmMenu}', 'MenuManagerController@updateMenu')->name('post.update.menu');
		Route::get('delete-menu-{idmMenu}', 'MenuManagerController@deleteMenu')->name('get.delete.menu');

		Route::get('quan-ly-ban', 'TableManagerController@getTable')->name('get.table');
		Route::post('create-table', 'TableManagerController@createTable')->name('post.create.table');
		Route::post('update-table-{idTable}', 'TableManagerController@updateTable')->name('post.update.table');
		Route::get('delete-table-{idTable}', 'TableManagerController@deleteTable')->name('get.delete.table');

		Route::get('quan-ly-nhan-vien', 'UserController@getUsers')->name('get.users');
		Route::post('create-user', 'UserController@createUser')->name('post.create.user');
		Route::post('update-user-{idUser}', 'UserController@updateUser')->name('post.update.user');

		Route::get('quan-ly-nha-cung-cap', 'ManageSuppierController@getSupplier')->name('get.supplier');
		Route::post('create-supplier', 'ManageSuppierController@createSupplier')->name('post.create.supplier');
		Route::post('update-supplier-{idSupplier}', 'ManageSuppierController@updateSupplier')->name('post.update.supplier');
		Route::get('delete-supplier-{idSupplier}', 'ManageSuppierController@deleteSupplier')->name('get.delete.supplier');

		Route::get('quan-ly-hang-hoa', 'ManageMatterialController@getMatterial')->name('get.matterial');
		Route::post('create-matterial', 'ManageMatterialController@createMatterial')->name('post.create.matterial');
		Route::post('update-matterial-{idMatterial}', 'ManageMatterialController@updateMatterial')->name('post.update.matterial');
		Route::get('delete-matterial-{idMatterial}', 'ManageMatterialController@deleteMatterial')->name('get.delete.matterial');

		Route::get('quan-ly-phieu-nhap-kho', 'GoodDeliveryNoteController@getGoodDeliveryNote')->name('get.goodDeliveryNote');
		Route::post('create-good-delivery-note', 'GoodDeliveryNoteController@createGoodDeliveryNote')->name('post.create.goodDeliveryNote');
		Route::post('update-good-delivery-note-{goodDeliveryNoteId}', 'GoodDeliveryNoteController@updateGoodDeliveryNote')->name('post.update.goodDeliveryNote');
		Route::get('delete-good-delivery-note-{goodDeliveryNoteId}', 'GoodDeliveryNoteController@deleteGoodDeliveryNote')->name('get.delete.goodDeliveryNote');
		Route::get('chi-tiet-phieu-nhap-kho-{goodDeliveryNoteId}', 'GoodDeliveryNoteController@getDetail')->name('get.goodDeliveryNoteDetail');

		Route::get('lap-hoa-don-ban-hang', 'SalesManagerController@getBillOfSale')->name('get.billofsale');
	});
});

