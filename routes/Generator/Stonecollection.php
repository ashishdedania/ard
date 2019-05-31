<?php

/**
 * Stone Collection
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

		Route::group(['namespace' => 'StoneCollection'], function () {
				Route::resource('stonecollection', 'stonecollectionController', ['except' => ['show']]);
				Route::any('stonecollection/{id}/{file}/download', 'stonecollectionController@DownloadFiles')->name('stonecollection.download');
				Route::any('stonecollection/{send}/Send', 'stonecollectionController@sendKnowledgebase')->name('stonecollection.Send');
				Route::any('stonecollection/{send}/send/customer', 'stonecollectionController@sendCustomer')->name('stonecollection.send.customer');
				Route::any('stonecollection/customer/ratings', 'stonecollectionController@customerRatings')->name('stonecollection.customer.ratings');
				Route::any('stonecollection/destroy/attachments', 'stonecollectionController@deleteAttachments')->name('stonecollection.destroy.attachments');
				Route::post('stonecollection/servicetype', 'stonecollectionController@serviceClient')->name('stonecollection.servicetype');
				//frontEnd
				Route::any('stonecollection/attachments', 'stonecollectionController@attachments')->name('stonecollection.attachments');
				Route::any('stonecollection/ratings', 'stonecollectionController@updateRatings')->name('stonecollection.ratings');
				//For Datatable
				Route::post('stonecollection/get', 'stonecollectionTableController')->name('stonecollection.get');
			});
	});
