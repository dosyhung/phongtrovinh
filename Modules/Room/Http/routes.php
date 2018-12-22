<?php

Route::group(['middleware' => 'web', 'prefix' => 'room', 'namespace' => 'Modules\Room\Http\Controllers'], function()
{
    Route::get('/', 'RoomController@index');
    Route::get('/create','RoomController@create')->name('room.create');
    Route::post('/create','RoomController@store')->name('room.create');

    Route::get('/district','RoomController@district');
    Route::get('/village','RoomController@village');

    Route::get('/index','RoomController@index')->name('room.index');
    Route::get('/delete/{id}','RoomController@destroy')->name('room.delete');
    Route::get('/edit/{id}', 'RoomController@edit')->name('room.edit');
    Route::post('/update/{id}', 'RoomController@update')->name('room.update');
    Route::get('/approve/{id}','RoomController@approve')->name('room.approve');
    Route::get('/unapprove/{id}','RoomController@unapprove')->name('room.unapprove');
});
