<?php

Route::group(['middleware' => 'web', 'prefix' => 'rating', 'namespace' => 'Modules\Rating\Http\Controllers'], function()
{
    Route::get('/', 'RatingController@index');
    Route::get('/create', 'RatingController@create')->name('rating.create');
    Route::post('/create', 'RatingController@store')->name('rating.create');
    Route::get('/index', 'RatingController@index')->name('rating.index');
});
