<?php

Route::group(['middleware' => 'web', 'prefix' => 'news', 'namespace' => 'Modules\News\Http\Controllers'], function()
{
    Route::get('/create', 'NewsController@create')->name('news.create');
    Route::post('/create', 'NewsController@store')->name('news.create');
    Route::get('/index', 'NewsController@index')->name('news.index');
    Route::get('/vip/{id}', 'NewsController@vip')->name('news.activeVip');
    Route::get('/hot/{id}', 'NewsController@hot')->name('news.activeHot');
    Route::get('/unvip/{id}', 'NewsController@unvip')->name('news.unactiveVip');
    Route::get('/unhot/{id}', 'NewsController@unhot')->name('news.unactiveHot');
});
