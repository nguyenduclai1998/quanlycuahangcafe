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

		Route::get('manage-menu', 'MenuManagerController@getMenu')->name('get.menu');
		Route::post('create-menu', 'MenuManagerController@createMenu')->name('post.create.menu');
		Route::post('update-menu-{idmMenu}', 'MenuManagerController@updateMenu')->name('post.update.menu');
		Route::get('delete-menu-{idmMenu}', 'MenuManagerController@deleteMenu')->name('get.delete.menu');

		Route::get('manage-table', 'TableManagerController@getTable')->name('get.table');
		Route::post('create-table', 'TableManagerController@createTable')->name('post.create.table');
		Route::post('update-table-{idTable}', 'TableManagerController@updateTable')->name('post.update.table');
		Route::get('delete-table-{idTable}', 'TableManagerController@deleteTable')->name('get.delete.table');

		Route::get('mamage-users', 'UserController@getUsers')->name('get.users');
		Route::post('create-user', 'UserController@createUser')->name('post.create.user');
		Route::post('update-user-{idUser}', 'UserController@updateUser')->name('post.update.user');

		Route::get('manage-supplier', 'ManageSuppierController@getSupplier')->name('get.supplier');
		Route::post('create-supplier', 'ManageSuppierController@createSupplier')->name('post.create.supplier');
		Route::post('update-supplier-{idSupplier}', 'ManageSuppierController@updateSupplier')->name('post.update.supplier');
		Route::get('delete-supplier-{idSupplier}', 'ManageSuppierController@deleteSupplier')->name('get.delete.supplier');

		Route::get('mamage-matterial', 'ManageMatterialController@getMatterial')->name('get.matterial');
		Route::post('create-matterial', 'ManageMatterialController@createMatterial')->name('post.create.matterial');
		Route::post('update-matterial-{idMatterial}', 'ManageMatterialController@updateMatterial')->name('post.update.matterial');
		Route::get('delete-matterial-{idMatterial}', 'ManageMatterialController@deleteMatterial')->name('get.delete.matterial');

		Route::get('good-delivery-note', 'GoodDeliveryNoteController@getGoodDeliveryNote')->name('get.getGoodDeliveryNote');

		Route::get('lap-hoa-don-ban-hang', 'SalesManagerController@getBillOfSale')->name('get.billofsale');
	});
});

