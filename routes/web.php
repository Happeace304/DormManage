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


//Route::get('/index','HomeController@List' );
Route::get('login','\App\Http\Controllers\Auth\LoginController@showLoginForm' )->name('login');

Route::get('/','HomeController@Home')->name('client');
Route::get('/danh-sach-tin-tuc','HomeController@ListOfNews' )->name('ListNews');
Route::get('/chi-tiet-tin-tuc','HomeController@NewsDetail' );
Route::get('/bang-gia','HomeController@BangGia' );


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();
//'middleware'=>['admin']
Route::group(['prefix'=> 'admin','middleware'=>['admin'] ], function (){

    Route::get('/',function (){
        return redirect()->route('DanhSachTinTuc');
    })->name('Admin.home');
    Route::group(['prefix'=> 'user'], function (){

        Route::get('danh-sach-sinh-vien', 'Admin\UserController@ListStudent')->name('DanhSachSinhVien');
        Route::get('danh-sach-nhan-vien', 'Admin\UserController@ListNhanVien')->name('DanhSachNhanVien');
        Route::get('them-sinh-vien', 'Admin\UserController@AddSinhVien')->name('ThemSinhVien');
        Route::get('them-nhan-vien', 'Admin\UserController@AddNhanVien')->name('ThemNhanVien');
        Route::get('tim-nv', 'Admin\UserController@SearchNhanVien')->name('NhanVien.Search');
        Route::get('tim-sv', 'Admin\UserController@SearchSinhVien')->name('SinhVien.Search');
        Route::post('save-nhan-vien', 'Admin\UserController@SaveNhanVien')->name('SaveNhanVien');
        Route::post('save-sinh-vien', 'Admin\UserController@SaveSinhVien')->name('SaveSinhVien');

        Route::get('edit-form-sinh-vien/{id}', 'Admin\UserController@EditFormSinhVien')->name('EditFormSinhVien');
        Route::get('edit-form-nhan-vien/{id}', 'Admin\UserController@EditFormNhanVien')->name('EditFormNhanVien');
        Route::put('save-edit-sinh-vien', 'Admin\UserController@SaveEditSinhVien')->name('SaveEditSinhVien');
        Route::put('save-edit-nhan-vien', 'Admin\UserController@SaveEditNhanVien')->name('SaveEditNhanVien');

        Route::delete('/xoa-user/{id}', 'Admin\UserController@Delete')->name('XoaUser');
        Route::delete('xoa-nhieu-user', 'Admin\UserController@MassDelete')->name('MassDel');

        Route::put('gia-han/{id}','Admin\UserController@Recharge')->name('User.Recharge');
        Route::get('/profile','Admin\UserController@Profile')->name('Profile');
        Route::put('/save-profile','Admin\UserController@SaveProfile')->name('SaveProfile');
    });
    Route::group(['prefix'=> 'room'], function (){
        Route::get('danh-sach-phong', 'Admin\RoomController@List')->name('DanhSachPhong');
        Route::get('/xem-chi-tiet-phong/{id}', 'Admin\RoomController@Detail')->name('XemChiTietPhong');
        Route::get('tim-phong', 'Admin\RoomController@SearchPhong')->name('Phong.Search');

    });
    Route::group(['prefix'=> 'news'], function (){
        Route::get('them-tin-tuc', 'Admin\NewsController@AddTinTuc')->name('ThemTinTuc');
        Route::get('danh-sach-tin-tuc', 'Admin\NewsController@List')->name('DanhSachTinTuc');
        Route::get('tim-tin-tuc', 'Admin\NewsController@SearchTinTuc')->name('TinTuc.Search');
        Route::post('save-tin-tuc', 'Admin\NewsController@SaveTinTuc')->name('SaveTinTuc');
        Route::delete('xoa-tin-tuc/{id}', 'Admin\NewsController@Delete')->name('XoaTinTuc');

        Route::get('edit-form-tin-tuc/{id}', 'Admin\NewsController@EditFormTinTuc')->name('EditFormTinTuc');
        Route::put('save-edit-tin-tuc', 'Admin\NewsController@SaveEdit')->name('SaveEditTinTuc');
        Route::delete('xoa-nhieu-tin-tuc', 'Admin\NewsController@MassDelete')->name('MassDelTinTuc');
    });
    Route::group(['prefix'=> 'bill'], function ()
    {
        Route::put('thanh-toan/{id}', 'Admin\BillController@ThanhToan')->name('ThanhToanHoaDon');
    });
});
Route::group(['prefix'=> ''],function (){
    Route::get('/profile','Client\UserController@Profile' );
    Route::put('/savep-rofile','Client\UserController@SaveProfile')->name('SaveClientProfile');
    Route::get('/xem/{slug}','HomeController@GetNews')->name('xemNews');

});



