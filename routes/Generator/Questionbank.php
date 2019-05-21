<?php
/**
 * Question Bank
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'QuestionBank'], function () {
        Route::resource('questionbanks', 'QuestionbanksController');
        Route::any('questionbanks/selectBehaviour','QuestionbanksController@selectBehaviour')->name('questionbanks.selectBehaviour');;
        //For Datatable
        Route::post('questionbanks/get', 'QuestionbanksTableController')->name('questionbanks.get');
    });
    
});