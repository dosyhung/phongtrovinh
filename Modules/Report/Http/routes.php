<?php

Route::group(['middleware' => 'web', 'prefix' => 'report', 'namespace' => 'Modules\Report\Http\Controllers'], function()
{
    Route::get('/', 'ReportController@index');
    Route::get('/create', 'ReportController@create')->name('report.create');
    Route::post('/create', 'ReportController@store')->name('report.create');
    Route::get('/index', 'ReportController@index')->name('report.index');
});
