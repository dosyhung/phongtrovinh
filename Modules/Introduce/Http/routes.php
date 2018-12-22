<?php

Route::group(['middleware' => 'web', 'prefix' => 'introduce', 'namespace' => 'Modules\Introduce\Http\Controllers'], function()
{
    Route::get('/', 'IntroduceController@index');
    Route::get('/create', 'IntroduceController@create')->name('introduce.create');
    Route::post('/create', 'IntroduceController@store')->name('introduce.create');
    Route::get('/index', 'IntroduceController@index')->name('introduce.index');
    Route::get('/delete/{id}', 'IntroduceController@destroy')->name('introduce.delete');
    Route::get('/edit/{id}', 'IntroduceController@edit')->name('introduce.edit');
    Route::post('/update/{id}', 'IntroduceController@update')->name('introduce.update');
});
