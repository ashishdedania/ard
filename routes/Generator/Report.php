<?php

 /**
  * Report
  *
  */
 Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
     Route::group(['namespace' => 'Report'], function () {
         // Route::resource('reports', 'ReportsController', ['except' => ['show']]);
         // Intervention reports
         Route::any('reports/charts', 'InterventionController@interventionChart')->name('reports.charts');
         Route::any('reports/charts/data', 'InterventionController@interventionchartData')->name('reports.charts.data');
         Route::post('reports/intervention/chart', 'InterventionController@interventionReport')->name('reports.intervention.chart');
         Route::any('reports/intervention/view','InterventionController@viewSessionChartModal')->name('reports.intervention.view');

         // threshold reports
         Route::any('reports/staff/threshold', 'ThresholdController@index')->name('reports.staff.threshold');
         Route::post('reports/staff/session', 'ThresholdController@getSession')->name('reports.staff.session');
         Route::post('reports/staff/threshold', 'ThresholdController@staffThresholdGraph')->name('reports.staff.threshold');
         // goal progress reports
         Route::any('reports/progress', 'ProgressController@index')->name('reports.progress');
         Route::any('reports/progress/generate', 'ProgressController@generateExcel')->name('reports.progress.generate');
         Route::any('reports/progress/goal', 'ProgressController@goalReport')->name('reports.progress.goal');

         // SDQ Status reports
         Route::any('reports/sdq', 'SdqController@index')->name('reports.sdq');
         Route::any('reports/sdq/generate', 'SdqController@generateExcel')->name('reports.sdq.generate');
         Route::post('reports/sdq/session', 'SdqController@getSession')->name('reports.sdq.session');

         // SCARED Status reports
         Route::any('reports/scared', 'ScaredController@index')->name('reports.scared');
         Route::any('reports/scared/generate', 'ScaredController@generateExcel')->name('reports.scared.generate');
         Route::post('reports/scared/session', 'ScaredController@getSession')->name('reports.scared.session');

         // CORE Status reports
         Route::any('reports/core', 'CoreController@index')->name('reports.core');
         Route::any('reports/core/generate', 'CoreController@generateExcel')->name('reports.core.generate');
         Route::post('reports/core/session', 'CoreController@getSession')->name('reports.core.session');
     });
 });

 