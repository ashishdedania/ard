<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');
Route::get('contact-us', 'FrontendController@contactus')->name('contact-us');
Route::post('sendcontact', 'FrontendController@sendcontact')->name('sendcontact');
Route::get('collections', 'FrontendController@stoneCollection')->name('collections');
Route::get('stone-collections/{id}/{sub}', 'FrontendController@stoneCollectionDetail')->name('stone-collections');

Route::get('gemstone-collections-all/{id}/{sub}', 'FrontendController@stoneProductDetail')->name('gemstone-collections-all');

Route::get('stone-talk', 'FrontendController@stoneTalk')->name('stone-talk');
Route::get('gemstone-collections/{id}', 'FrontendController@production')->name('gemstone-collections');

Route::get('indoor-applications', 'FrontendController@indoor')->name('indoor-applications');

Route::get('outdoor-applications', 'FrontendController@outdoor')->name('outdoor-applications');

Route::get('getajax', 'FrontendController@getajax')->name('getajax');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
