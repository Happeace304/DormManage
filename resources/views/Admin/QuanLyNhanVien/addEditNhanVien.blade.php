@extends('layouts.layoutAdmin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin nhân viên</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{$action}}" enctype="multipart/form-data">
                        @if(isset($user)) @method('PUT') @endif
                        @csrf
                        <input type="text" id="userId"  name="userId"
                               value="{{ isset($user)?$user->userId:''}}" hidden>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ isset($user)?$user->name:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Điện thoại <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ isset($user)?$user->phone:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ isset($user)?$user->email:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Địa chỉ <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ isset($user)?$user->address:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default @if(isset($user)){{$user->gender==1?' active':'' }} @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="true" @if(isset($user)){{$user->gender==1?'checked':'' }} @endif> &nbsp; Nam &nbsp;
                                    </label>
                                    <label class="btn btn-primary @if(isset($user)){{$user->gender==0?' active':'' }} @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="false" @if(isset($user)){{$user->gender==0?'checked':'' }} @endif> Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday" name="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date"
                                       value="{{isset($user)?date('Y-m-d',strtotime($user->birthday)):''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Ảnh đại diện</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                                @if(isset($user))<input type="text" hidden name="old_image" value="{{$user->imgLink}}"> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Mật khẩu @if(!isset($user))<span class="required">*</span> @endif
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password" name="password" @if(!isset($user))required="required"@endif class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <input type="text" hidden name="role" value="1">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-danger" type="button">Xóa nhân viên</button>
                                <button type="submit" class="btn btn-success" style="float: right">Lưu thông tin nhân viên</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
