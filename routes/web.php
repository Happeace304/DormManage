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

Route::get('/','HomeController@Home')->name('client');
//Route::get('/index','HomeController@List' );
Route::get('login','\App\Http\Controllers\Auth\LoginController@showLoginForm' )->name('login');

Route::get('/danhsachtintuc','HomeController@ListOfNews' )->name('ListNews');
Route::get('/chitiettintuc','HomeController@NewsDetail' );
Route::get('/banggia','HomeController@BangGia' );


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();
//'middleware'=>['admin']
Route::group(['prefix'=> 'admin','middleware'=>['admin'] ], function (){

    Route::get('/',function (){
        return redirect()->route('DanhSachTinTuc');
    })->name('Admin.home');
    Route::group(['prefix'=> 'user'], function (){

        Route::get('danhsachsinhvien', 'Admin\UserController@ListStudent')->name('DanhSachSinhVien');
        Route::get('danhsachnhanvien', 'Admin\UserController@ListNhanVien')->name('DanhSachNhanVien');
        Route::get('themsinhvien', 'Admin\UserController@AddSinhVien')->name('ThemSinhVien');
        Route::get('themnhanvien', 'Admin\UserController@AddNhanVien')->name('ThemNhanVien');
        Route::get('timnv', 'Admin\UserController@SearchNhanVien')->name('NhanVien.Search');
        Route::get('timsv', 'Admin\UserController@SearchSinhVien')->name('SinhVien.Search');
        Route::post('savenhanvien', 'Admin\UserController@SaveNhanVien')->name('SaveNhanVien');
        Route::post('savesinhvien', 'Admin\UserController@SaveSinhVien')->name('SaveSinhVien');

        Route::get('editformsinhvien/{id}', 'Admin\UserController@EditFormSinhVien')->name('EditFormSinhVien');
        Route::get('editformnhanvien/{id}', 'Admin\UserController@EditFormNhanVien')->name('EditFormNhanVien');
        Route::put('saveeditsinhvien', 'Admin\UserController@SaveEditSinhVien')->name('SaveEditSinhVien');
        Route::put('saveeditnhanvien', 'Admin\UserController@SaveEditNhanVien')->name('SaveEditNhanVien');

        Route::delete('/xoauser/{id}', 'Admin\UserController@Delete')->name('XoaUser');
        Route::delete('xoanhieuuser', 'Admin\UserController@MassDelete')->name('MassDel');

        Route::put('giahan/{id}','Admin\UserController@Recharge')->name('User.Recharge');
        Route::get('/profile','Admin\UserController@Profile')->name('Profile');
        Route::put('/saveprofile','Admin\UserController@SaveProfile')->name('SaveProfile');
    });
    Route::group(['prefix'=> 'room'], function (){
        Route::get('danhSachPhong', 'Admin\RoomController@List')->name('DanhSachPhong');
        Route::get('/xemchitietphong/{id}', 'Admin\RoomController@Detail')->name('XemChiTietPhong');
        Route::get('timphong', 'Admin\RoomController@SearchPhong')->name('Phong.Search');

    });
    Route::group(['prefix'=> 'news'], function (){
        Route::get('themtintuc', 'Admin\NewsController@AddTinTuc')->name('ThemTinTuc');
        Route::get('danhsachtintuc', 'Admin\NewsController@List')->name('DanhSachTinTuc');
        Route::get('timtintuc', 'Admin\NewsController@SearchTinTuc')->name('TinTuc.Search');
        Route::post('savetintuc', 'Admin\NewsController@SaveTinTuc')->name('SaveTinTuc');
        Route::delete('xoatintuc/{id}', 'Admin\NewsController@Delete')->name('XoaTinTuc');

        Route::get('editformtintuc/{id}', 'Admin\NewsController@EditFormTinTuc')->name('EditFormTinTuc');
        Route::put('saveedittintuc', 'Admin\NewsController@SaveEdit')->name('SaveEditTinTuc');
        Route::delete('xoanhieutintuc', 'Admin\NewsController@MassDelete')->name('MassDelTinTuc');
    });
    Route::group(['prefix'=> 'bill'], function ()
    {
        Route::put('thanhtoan/{id}', 'Admin\BillController@ThanhToan')->name('ThanhToanHoaDon');
    });
});
Route::group(['prefix'=> ''],function (){
    Route::get('/profile','Client\UserController@Profile' );
    Route::put('/saveprofile','Client\UserController@SaveProfile')->name('SaveClientProfile');
    Route::get('/xem/{slug}','HomeController@GetNews')->name('xemNews');

});



