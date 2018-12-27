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

        Route::get('/DanhSachSinhVien', 'Admin\UserController@ListStudent')->name('DanhSachSinhVien');
        Route::get('/DanhSachNhanVien', 'Admin\UserController@ListNhanVien')->name('DanhSachNhanVien');
        Route::get('/ThemSinhVien', 'Admin\UserController@AddSinhVien')->name('ThemSinhVien');
        Route::get('/ThemNhanVien', 'Admin\UserController@AddNhanVien')->name('ThemNhanVien');
        Route::get('timNV', 'Admin\UserController@SearchNhanVien')->name('NhanVien.Search');
        Route::get('timSV', 'Admin\UserController@SearchSinhVien')->name('SinhVien.Search');
        Route::post('/SaveNhanVien', 'Admin\UserController@SaveNhanVien')->name('SaveNhanVien');
        Route::post('/SaveSinhVien', 'Admin\UserController@SaveSinhVien')->name('SaveSinhVien');

        Route::get('/EditFormSinhVien/{id}', 'Admin\UserController@EditFormSinhVien')->name('EditFormSinhVien');
        Route::get('/EditFormNhanVien/{id}', 'Admin\UserController@EditFormNhanVien')->name('EditFormNhanVien');
        Route::put('/SaveEditSinhVien', 'Admin\UserController@SaveEditSinhVien')->name('SaveEditSinhVien');
        Route::put('/SaveEditNhanVien', 'Admin\UserController@SaveEditNhanVien')->name('SaveEditNhanVien');

        Route::delete('/XoaUser/{id}', 'Admin\UserController@Delete')->name('XoaUser');
    });
    Route::group(['prefix'=> 'room'], function (){
        Route::get('/DanhSachPhong', 'Admin\RoomController@List')->name('DanhSachPhong');
        Route::get('/XemChiTietPhong/{id}', 'Admin\RoomController@Detail')->name('XemChiTietPhong');
        Route::get('timPhong', 'Admin\RoomController@SearchPhong')->name('Phong.Search');
    });
    Route::group(['prefix'=> 'news'], function (){
        Route::get('/ThemTinTuc', 'Admin\NewsController@AddTinTuc')->name('ThemTinTuc');
        Route::get('/DanhSachTinTuc', 'Admin\NewsController@List')->name('DanhSachTinTuc');
        Route::get('timTinTuc', 'Admin\NewsController@SearchTinTuc')->name('TinTuc.Search');
        Route::post('SaveTinTuc', 'Admin\NewsController@SaveTinTuc')->name('SaveTinTuc');
        Route::delete('/XoaTinTuc/{id}', 'Admin\NewsController@Delete')->name('XoaTinTuc');

    });
    Route::group([], function () //Client link
    {
        //getlist name('News.List)
        //getnewsbyid
        //mot-ngay-dep-troi
    });
});



