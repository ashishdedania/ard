<?php
/**
 * Feedback
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Feedback'], function () 
    {
        Route::resource('feedback', 'FeedbackController');

        Route::any('feedback/add/commnet/{intervention_type_id}', 'FeedbackController@addComment')->name('feedback.add.feedback');

        Route::any('feedback/storeFeedback/{intervention_type_id}', 'FeedbackController@storeFeedback')->name('store.feedback');

        //For Datatable
        Route::post('feedback/get', 'FeedbackTableController')->name('feedback.get');
		
    });

    
});
