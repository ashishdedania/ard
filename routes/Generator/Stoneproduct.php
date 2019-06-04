<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'StoneProduct'], function () {
				Route::resource('stoneproduct', 'stoneproductController', ['except' => ['show']]);
				
				//For Datatable
				Route::post('stoneproduct/get', 'stoneproductTableController')->name('stoneproduct.get');
			});
	});
