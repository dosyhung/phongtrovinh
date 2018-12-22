<?php

Route::group(['middleware' => 'web', 'prefix' => 'category', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::get('/', 'CategoryController@index');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/create','CategoryController@store')->name('category.create');
    Route::get('/index','CategoryController@index')->name('category.index');
    Route::get('/delete/{id}','CategoryController@destroy')->name('category.delete');
    Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}','CategoryController@update')->name('category.update');
    Route::get('/detail/{id}','CategoryController@detail')->name('category.detail');
});
