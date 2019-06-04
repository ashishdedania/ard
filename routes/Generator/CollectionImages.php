<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'StoneCollectionImage'], function () {
				Route::resource('collectionimage', 'stonecollectionimageController', ['except' => ['show']]);
				
				
			});
	});
