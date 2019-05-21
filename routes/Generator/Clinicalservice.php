<?php
/**
 * Routes for : Clinic Services
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'ClinicalService'], function () {
	    Route::get('clinicalservices', 'ClinicalservicesController@index')->name('clinicalservices.index');
	    Route::get('clinicalservices/create', 'ClinicalservicesController@create')->name('clinicalservices.create');
	    Route::post('clinicalservices', 'ClinicalservicesController@store')->name('clinicalservices.store');
	    Route::get('clinicalservices/{clinicalservice}/edit', 'ClinicalservicesController@edit')->name('clinicalservices.edit');
	    Route::patch('clinicalservices/{clinicalservice}', 'ClinicalservicesController@update')->name('clinicalservices.update');
	    
	    //For Datatable
	    Route::post('clinicalservices/get', 'ClinicalservicesTableController')->name('clinicalservices.get');
	});
	
});