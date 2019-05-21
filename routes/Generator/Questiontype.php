<?php
/**
 * Question Type
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'QuestionType'], function () {
        Route::resource('questiontypes', 'QuestiontypesController');
        //For Datatable
        Route::post('questiontypes/get', 'QuestiontypesTableController')->name('questiontypes.get');
    });
    
});