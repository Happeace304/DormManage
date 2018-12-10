<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Client.HomeLayout');
});

Route::get('/login_site', function () {
    return view('login');
});


Route::group(['prefix'=> 'admin'], function (){

    Route::get('/home', 'HomeController@index')->name('Admin.home');
    Route::group(['prefix'=> 'user'], function (){
        Route::get('/list', 'Admin\UserController@list')->name('User.list');
        Route::get('/edit/{id}', 'Admin\UserController@EditForm')->name('User.edit');
        Route::post('/edit', 'Admin\UserController@SaveEdit')->name('User.SaveEdit');
    });
    Route::group(['prefix'=> 'employee'], function (){
        Route::get('/list', 'Admin\UserController@list')->name('Emp.list');
    });

    Auth::routes();
});



