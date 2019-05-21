<?php
/**
 * Routes for : Psycological Condition Type
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'PsycologicalConditionType'], function () {
	    Route::get('psycologicalconditiontypes', 'PsycologicalconditiontypesController@index')->name('psycologicalconditiontypes.index');
	    Route::get('psycologicalconditiontypes/create', 'PsycologicalconditiontypesController@create')->name('psycologicalconditiontypes.create');
	    Route::post('psycologicalconditiontypes', 'PsycologicalconditiontypesController@store')->name('psycologicalconditiontypes.store');
	    Route::get('psycologicalconditiontypes/{psycologicalconditiontype}/edit', 'PsycologicalconditiontypesController@edit')->name('psycologicalconditiontypes.edit');
	    Route::patch('psycologicalconditiontypes/{psycologicalconditiontype}', 'PsycologicalconditiontypesController@update')->name('psycologicalconditiontypes.update');
	    
	    //For Datatable
	    Route::post('psycologicalconditiontypes/get', 'PsycologicalconditiontypesTableController')->name('psycologicalconditiontypes.get');
	});
	
});