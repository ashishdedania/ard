<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'StoneCollection'], function () {
				Route::resource('stonecollection', 'stonecollectionController', ['except' => ['show']]);
				
				//For Datatable
				Route::post('stonecollection/get', 'stonecollectionTableController')->name('stonecollection.get');
			});
	});
