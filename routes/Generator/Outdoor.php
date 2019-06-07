<?php

/**
 * Outdoor Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'OutdoorCollection'], function () {
				Route::resource('outdoorcollection', 'outdoorcollectionController', ['except' => ['show']]);
				
				//For Datatable
				Route::post('outdoorcollection/get', 'outdoorcollectionTableController')->name('outdoorcollection.get');
			});
	});
