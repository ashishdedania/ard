<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'SubStoneCollection'], function () {
				Route::resource('substonecollection', 'substonecollectionController', ['except' => ['show']]);
				
				//For Datatable
				Route::post('substonecollection/get', 'substonecollectionTableController')->name('substonecollection.get');
			});
	});
