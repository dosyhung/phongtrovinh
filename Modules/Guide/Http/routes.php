<?php

Route::group(['middleware' => 'web', 'prefix' => 'guide', 'namespace' => 'Modules\Guide\Http\Controllers'], function()
{
    Route::get('/', 'GuideController@index');
    Route::get('/create','GuideController@create')->name('guide.create');
    Route::post('/create','GuideController@store')->name('guide.create');
    Route::get('/index','GuideController@index')->name('guide.index');
    Route::get('/delete/{id}','GuideController@destroy')->name('guide.delete');
    Route::get('/edit/{id}','GuideController@edit')->name('guide.edit');
    Route::post('/update/{id}','GuideController@update')->name('guide.update');
    Route::get('/detail/{id}','GuideController@detail')->name('guide.detail');
});
