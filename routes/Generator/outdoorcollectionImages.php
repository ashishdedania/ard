<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'OutdoorCollectionImage'], function () {
				Route::resource('outdoorimage', 'outdoorcollectionimageController', ['except' => ['show']]);
				
				
			});
	});
