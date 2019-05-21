<?php
/**
 * Manage Session
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'ManageSession'], function () {
				Route::resource('managesessions', 'ManagesessionsController');
				Route::any('managesessions/intervention', 'ManagesessionsController@interventionTypeGet')->name('managesessions.intervention');
				Route::any('managesessions/intervention/data', 'ManagesessionsController@index')->name('managesessions.intervention.data');
				//front-end managesession view details.
				Route::any('managesessions/view/details/{type}', 'ManagesessionsController@viewSessionDetails')->name('managesessions.view.details');
				Route::any('managesessions/submit/question', 'ManagesessionsController@submitQuestion')->name('managesessions.submit.question');
				Route::any('managesessions/view/question/{type}/{sessionid}', 'ManagesessionsController@viewSubmitedQuestion')->name('managesessions.view.question');
				Route::any('managesession/export/question/{type}/{sessionId}', 'ManagesessionsController@exportQuestionDetails')->name('managesessions.export.question');
				Route::any('managesessions/{managesession}/views/details', 'ManagesessionsController@veiwDeatils')->name('managesessions.views.details');
				//For Datatable
				Route::post('managesessions/get', 'ManagesessionsTableController')->name('managesessions.get');
			});

	});
