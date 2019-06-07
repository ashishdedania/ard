<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'IndoorImages'], function () {
				Route::resource('indoorimages', 'indoorimagesController', ['except' => ['show']]);
				
				//For Datatable
				Route::post('indoorimages/get', 'indoorimagesTableController')->name('indoorimages.get');
			});
	});
