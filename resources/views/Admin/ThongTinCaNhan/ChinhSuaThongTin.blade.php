@extends('layouts.layoutAdmin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Avatar</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <form class="x_content" action="{{route('SaveProfile')}}" method="post" enctype="multipart/form-data"   >
                @csrf
                @method('PUT')
                <input class="hidden" name="userId" value="{{$user->userId}}"/>
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <img style="margin-top: 5px; margin-bottom: 10px; max-width: 235px;" class="img-preview" @if(Auth::user()->imgLink == null) src="{{ asset('public/image/avatar/user.png') }}"
                             @else src="{{asset('public/image/avatar').'/'.Auth::user()->imgLink}}"
                             @endif
                             alt="..." class="img-circle profile_img" id="img_preview">
                        <div class="input-group">
                                <span class="input-group-btn">
                                    <input class="form-control" type="file" style="width: 96%; display: none;" name="imglink" id="imglink"
                                    onchange="loadFile();"/>
                                    @if(isset($user))<input type="text" hidden name="old_image" value="{{$user->imgLink}}"> @endif
                                    <input class="form-control" type="text" id="fake" disabled>
                                    <a href="javascript:document.getElementById('imglink').click(); " id="btn-anh" class="btn btn-primary">
                                        <i class="fa fa-upload" aria-hidden="true" ></i>
                                    </a>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <button type="submit" class="btn-success btn btn-sm"  name="savebtn" value="avatar" />
                        Lưu
                    </div>
                </div>
            </form>
        </div>
    </div>
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
            <form class="x_content" action="{{route('SaveProfile')}}" method="post">
                @csrf
                @method('PUT')

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif

                <div class="row">
                    <input class="hidden" name="userId" value="{{$user->userId}}"/>
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name='name' value="{{$user->name}}" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Ngày sinh </label>
                                <input type="date" class="form-control date" name="birthday" value="{{$user->birthday}}" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control" name="gender">
                                    <option value="1" {{$user->gender ==1?'selected':''}}>Nam</option>
                                    <option value="0" {{$user->gender ==0?'selected':''}}>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <button type="submit" class="btn-success btn btn-sm" id="btn-luu-tai-khoan" name="savebtn" value="information" />
                                Lưu
                            </div>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">

                    </div>
                </div>
            </form>
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
            <form class="x_content" action="{{route('SaveProfile')}}" method="post">
                @csrf
                @method('PUT')
                <input class="hidden" name="userId" value="{{$user->userId}}"/>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" disabled class="form-control" value="{{$user->email}}" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="old_pass"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="new_pass" id="new_pass" />
                            <span id='formatPassword'></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" />
                            <span id='message'></span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn-success btn btn-sm" id="btn-cap-nhat-mat-khau" name='savebtn' value="password" />
                            Lưu mật khẩu

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
