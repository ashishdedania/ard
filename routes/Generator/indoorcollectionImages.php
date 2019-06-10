<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'IndoorCollectionImage'], function () {
				Route::resource('indoorcollectionimage', 'indoorcollectionimageController', ['except' => ['show']]);
				
				
			});
	});
