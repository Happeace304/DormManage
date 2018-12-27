@extends('layouts.layoutAdmin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin cá nhân</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <input class="hidden" id="IdTaiKhoan" value=""/>
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Ngày sinh </label>
                                <input type="date" class="form-control date" id="NgaySinh" value="" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control" id="GioiTinh">
                                    <option value="">Nam</option>
                                    <option value="">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" id="SoDienThoai" value="" />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" id="DiaChi" value="" />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <input type="button" class="btn-success btn btn-sm" id="btn-luu-tai-khoan" value="Lưu" />
                            </div>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông tin tài khoản</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" disabled class="form-control" value="" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="MatKhauCu"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="MatKhauMoi" id="MatKhauMoi" />
                            <span id='formatPassword'></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="XacNhanMatKhau" id="XacNhanMatKhau" />
                            <span id='message'></span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <input type="button" class="btn-success btn btn-sm" id="btn-cap-nhat-mat-khau" value="Lưu mật khẩu" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
