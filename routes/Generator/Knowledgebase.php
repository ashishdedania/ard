<?php

/**
 * Knowledge Base
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace'                                                 => 'KnowledgeBase'], function () {
				Route::resource('knowledgebases', 'KnowledgebasesController', ['except' => ['show']]);
				Route::any('knowledgebases/{id}/{file}/download', 'KnowledgebasesController@DownloadFiles')->name('knowledgebases.download');
				Route::any('knowledgebases/{send}/Send', 'KnowledgebasesController@sendKnowledgebase')->name('knowledgebases.Send');
				Route::any('knowledgebases/{send}/send/customer', 'KnowledgebasesController@sendCustomer')->name('knowledgebases.send.customer');
				Route::any('knowledgebases/customer/ratings', 'KnowledgebasesController@customerRatings')->name('knowledgebases.customer.ratings');
				Route::any('knowledgebases/destroy/attachments', 'KnowledgebasesController@deleteAttachments')->name('knowledgebases.destroy.attachments');
				Route::post('knowledgebases/servicetype', 'KnowledgebasesController@serviceClient')->name('knowledgebases.servicetype');
				//frontEnd
				Route::any('knowledgebases/attachments', 'KnowledgebasesController@attachments')->name('knowledgebases.attachments');
				Route::any('knowledgebases/ratings', 'KnowledgebasesController@updateRatings')->name('knowledgebases.ratings');
				//For Datatable
				Route::post('knowledgebases/get', 'KnowledgebasesTableController')->name('knowledgebases.get');
			});
	});
