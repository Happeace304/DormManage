@extends('layouts.layoutUser')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center no-line">Thông tin cá nhân</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Search Category Start-->
<div class="search-category mb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-container">
                    <form id="form-information" enctype="multipart/form-data" action="#" accept-charset="UTF-8" method="post">
                    <div class="box-select">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-7 avatar">
                                        <div>
                                            <img id="imgPreview0" class="img-preview"
                                                 @if($user->imgLink)
                                                 src="{{ asset('public/image/').'/'.$user->imgLink  }}"
                                                         @else
                                                 src="{{ asset('public/image/user.png') }}"
                                            @endif
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="avatar" class="white-label text-mul">Avatar</label>
                                        <div class="input-group">
                                            {{--<input class="form-control " type="text" name="LinkAnh" id="imageName" readonly="readonly" style="background: #fff !important;" />--}}
                                            <span class="input-group-btn">
                                    <input class="form-control" readonly="readonly" style="width: 96%" name="imglink" id="imglink" value=""/>
                                    <a href="javascript:void(0)" id="btn-anh" class="btn btn-primary">
                                        <i class="fa fa-upload"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="ho" class="white-label text-mul">Họ tên <span class="text-required">*</span></label>
                                        <input type="text" name="ho" id="ho" class="required mb-5" maxlength="50" tabindex="1" value="{{$user->name}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ten" class="white-label text-mul">Email </label>
                                        <input type="text" readonly="readonly" name="ten" id="ten" class="required mb-5" maxlength="50" tabindex="2" value="{{$user->email}}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="GioiTinh" class="white-label text-mul">Giới tính</label>
                                        <select name="GioiTinh" id="GioiTinh" class="required mb-5" tabindex="3">
                                            <option value="true" {{$user->gender==1?'selected':''}} >Nam</option>
                                            <option value="false" {{$user->gender==0?'selected':''}}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="NgaySinh" class="white-label text-mul">Ngày sinh </label>
                                        <div class="input-group datetimepicker mb-5">
                                            <input type="tel" class="date  " id="NgaySinh" name="NgaySinh" maxlength="8" tabindex="4" value="{{$user->birthday}}" />
                                            <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sdt" class="white-label text-mul">Số điện thoại </label>
                                        <input type="tel" name="sdt" id="sdt"  tabindex="5" class=" numeric mb-5" value="{{$user->phone}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="cmnd" class="white-label text-mul">Địa chỉ </label>
                                        <input type="text" name="address"  id="address" tabindex="6" class=" numeric mb-5" value="{{$user->address}}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sdt" class="white-label text-mul">Phòng </label>
                                        <select readonly="readonly" name="sdt" id="sdt" tabindex="5" class=" numeric mb-5" value="">
                                            @foreach($room as $item)
                                            <option value="{{$item->roomId}}" {{$item->roomId==$user->roomId?'selected':''}}>{{$item->roomName}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="cmnd" class="white-label text-mul">Ngày hết hạn </label>
                                        <input type="date" readonly="readonly" name="address" maxlength="255" id="address" tabindex="6" class=" numeric mb-5" value="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3" style="margin-top: 10px;">
                                        <button type="button" id="btn-save"tabindex="18">Lưu thông tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr />
                        </div>
                    </div>
                    </form>
                        <form id="form-changePassword" action="#" method="post">
                        <div class="box-select">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="changePassword" class="white-label text-mul">Mật khẩu cũ<span class="text-required">*</span></label>
                                    <input type="password" name="changePassword" id="changePassword" class="required mb-5" maxlength="50" tabindex="22" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="newPassword" class="white-label text-mul">Mật khẩu mới <span class="text-required">*</span></label>
                                    <input type="password" name="newPassword" id="newPassword" class="required mb-5" maxlength="50" tabindex="23" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="ConfirmPassword" class="white-label text-mul">Xác nhận lại mật khẩu <span class="text-required">*</span></label>
                                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="required mb-5" maxlength="50" tabindex="24" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="newPassword" class="white-label text-mul"> </label>
                                    <button type="button" id="btn-change" style="margin-top: 5px;" tabindex="25">Thay đổi mật khẩu</button>
                                </div>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Search Category-->
@endsection
