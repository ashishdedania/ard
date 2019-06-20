<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'generalsettings'], function () {
				Route::resource('generalsettings', 'generalsettingsController', ['except' => ['show']]);
				
				
			});
	});
