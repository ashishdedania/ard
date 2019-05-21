<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('get-permission', 'DashboardController@getPermissionByRole')->name('get.permission');

/*
 * Edit Profile
 */
Route::get('profile/edit', 'DashboardController@editProfile')->name('profile.edit');
Route::patch('profile/update', 'DashboardController@updateProfile')
	->name('profile.update');
Route::patch('client/profile/update', 'DashboardController@clientProfileUpdate')
	->name('client.profile.update');
Route::any('client/change/password', 'DashboardController@resetPassword')->name('client.change.password');
Route::any('client/update/password', 'DashboardController@updateClientPassword')->name('client.update.password');
