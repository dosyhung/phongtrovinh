<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {

    //xác thực người dùng đăng nhập
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/dashboard', function () {
            return view('admin::layouts.master');
        })->name('admin.dashboard');
        Route::get('/index', 'AdminController@index')->name('admin.index');
        Route::get('/create', 'AdminController@create')->name('admin.create');
        Route::post('/create', 'AdminController@store')->name('admin.create');
        Route::get('/delete/{id}', 'AdminController@destroy')->name('admin.delete')->middleware(['can:show-profile']);
        Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
        Route::post('/update/{id}', 'AdminController@update')->name('admin.update');
        Route::get('/detail/{id}', 'AdminController@detail')->name('admin.detail');
        //kiem duyet admin
        Route::get('/approve/{id}', 'AdminController@approve')->name('admin.approve');
        Route::get('/unapprove/{id}', 'AdminController@unapprove')->name('admin.unapprove');
        //thay đổi avatar bằng ajax
        Route::post('/update-avatar/{id}', 'AdminController@avatar')->name('admin.avatar');
        Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    });
    Route::get('/register','AdminController@register')->name('admin.register');
    Route::get('/', 'AdminController@getlogin')->name('admin.login');
    Route::post('/', 'AdminController@postlogin')->name('admin.login');


});
