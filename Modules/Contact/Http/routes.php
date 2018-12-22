<?php

Route::group(['middleware' => 'web', 'prefix' => 'contact', 'namespace' => 'Modules\Contact\Http\Controllers'], function()
{
    Route::get('/', 'ContactController@index');
    Route::get('/create','ContactController@create')->name('contact.create');
    Route::post('/create','ContactController@store')->name('contact.create');
    Route::get('/index','ContactController@index')->name('contact.index');
    Route::get('/delete/{id}','ContactController@destroy')->name('contact.delete');
    Route::get('/edit/{id}','ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','ContactController@update')->name('contact.update');
    Route::get('/detail/{id}','ContactController@detail')->name('contact.detail');
});
