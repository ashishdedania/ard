<?php
/**
 * Client
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'Client'], function () {
				Route::resource('clients', 'ClientsController');
				Route::any('clients/custom/question/{client}', 'ClientsController@addCustomQuestion')->name('clients.custom.question');
				Route::any('clients/store/question/{clients}','ClientsController@storeQuestion')->name('clients.store.question');
				//For Datatable
				Route::post('clients/get', 'ClientsTableController')->name('clients.get');
			});

	});