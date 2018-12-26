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
})->name('client');
Route::get('/index','HomeController@List' );
Route::get('/news/{slug}','HomeController@GetNews' );

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
//'middleware'=>['admin']
Route::group(['prefix'=> 'admin','middleware'=>['admin'] ], function (){

    Route::get('/home', 'HomeController@index')->name('Admin.home');

    Route::group(['prefix'=> 'user'], function (){

        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        Route::get('/edit/{id}', 'Admin\UserController@EditForm')->name('User.Edit');
        Route::put('/edit', 'Admin\UserController@Update')->name('User.SaveEdit');
        Route::delete('/delete/{id}', 'Admin\UserController@Delete')->name('User.Delete');
        Route::get('search', 'Admin\UserController@Search')->name('User.Search');
        Route::get('/detail/{id}', 'Admin\UserController@Detail')->name('User.Detail');
        Route::put('/recharge', 'Admin\UserController@Recharge')->name('User.Recharge');
        Route::get('/DanhSachSinhVien', 'Admin\UserController@ListStudent')->name('DanhSachSinhVien');
        Route::get('/DanhSachNhanVien', 'Admin\UserController@ListNhanVien')->name('DanhSachNhanVien');
        Route::get('/ThemSinhVien', 'Admin\UserController@AddSinhVien')->name('ThemSinhVien');
        Route::get('/ThemNhanVien', 'Admin\UserController@AddNhanVien')->name('ThemNhanVien');
        Route::get('timNV', 'Admin\UserController@SearchNhanVien')->name('NhanVien.Search');
        Route::get('timSV', 'Admin\UserController@SearchSinhVien')->name('SinhVien.Search');
    });
    Route::group(['prefix'=> 'room'], function (){
        Route::get('/DanhSachPhong', 'Admin\RoomController@List')->name('DanhSachPhong');
    });
    Route::group(['prefix'=> 'news'], function (){
        Route::get('/DanhSachTinTuc', 'Admin\NewsController@List')->name('DanhSachTinTuc');
    });
    Route::group([], function () //Client link
    {
        //getlist name('News.List)
        //getnewsbyid
        //mot-ngay-dep-troi
    });
});



