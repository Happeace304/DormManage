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
                        <form id="form-information" enctype="multipart/form-data"
                              action="{{route('SaveClientProfile')}}" accept-charset="UTF-8"
                              method="post">
                            @csrf
                            @method('PUT')
                            <div class="box-select">
                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="row">
                                            <div class="col-sm-7 avatar">
                                                <div>
                                                    <img id="img_preview" class="img-preview"
                                                         @if($user->imgLink)
                                                         src="{{ asset('public/image/avatar').'/'.$user->imgLink  }}"
                                                         @else
                                                         src="{{ asset('public/image/avatar/user.png') }}"
                                                            @endif
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <label for="avatar" class="white-label text-mul">Avatar</label>
                                                <div class="input-group">
                                       <span class="input-group-btn">
                                  <input class="form-control" type="file" style="width: 96%; display: none;"
                                         name="imglink" id="imglink"
                                         onchange="loadFile();"/>
                                           @if(isset($user))
                                               <input type="text" hidden
                                                      name="old_image"
                                                      value="{{$user->imgLink}}">
                                           @endif
                                           <input class="form-control" style="height:34px ;" type="text" id="fake"
                                                  disabled>
                                    <a href="javascript:document.getElementById('imglink').click(); " id="btn-anh"
                                       class="btn btn-primary">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    </a>


                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <p style="padding-left: 10px; font-size: 14px; color: #FE2E2E"> @if($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        {{$error}}
                                                    @endforeach
                                                @endif</p>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="ho" class="white-label text-mul">Họ tên <span
                                                            class="text-required">*</span></label>
                                                <input type="text" name="name" id="name" class="required mb-5"
                                                       maxlength="50" tabindex="1" value="{{$user->name}}"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="ten" class="white-label text-mul">Email <span
                                                            class="text-required">*</span></label>
                                                <input type="text" readonly="readonly" name="email" id="email"
                                                       class="required mb-5" maxlength="50" tabindex="2"
                                                       value="{{$user->email}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="GioiTinh" class="white-label text-mul">Giới tính</label>
                                                <select name="gender" class="required mb-5"
                                                        tabindex="3">
                                                    <option  value="1" {{$user->gender==1?'selected':''}} >Nam
                                                    </option>
                                                    <option value="0" {{$user->gender==0?'selected':''}}>Nữ</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="NgaySinh" class="white-label text-mul">Ngày sinh <span
                                                            class="text-required">*</span></label>
                                                <input type="date" class="date numeric mb-5" id="birthday" name="birthday"
                                                       maxlength="8" tabindex="4" value="{{$user->birthday}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="sdt" class="white-label text-mul">Số điện thoại <span
                                                            class="text-required">*</span></label>
                                                <input type="tel" name="phone" id="phone" tabindex="5"
                                                       class=" numeric mb-5" value="{{$user->phone}}"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="cmnd" class="white-label text-mul">Địa chỉ <span
                                                            class="text-required">*</span></label>
                                                <input type="text" name="address" id="address" tabindex="6"
                                                       class=" mb-5" value="{{$user->address}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="room" class="white-label text-mul">Phòng </label>
                                                <input type="text" disabled name="room" id="room" tabindex="5"
                                                       class=" mb-5" value="{{$room->roomName}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="expire_date" class="white-label text-mul">Ngày hết
                                                    hạn </label>
                                                <input type="tel" class="date" readonly="readonly" name="expire_date"
                                                       id="expire_date" tabindex="6" class=" mb-5"
                                                       value="{{$user->expire_date}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3" style="margin-top: 10px;">
                                                <button type="submit" id="btn-save" name='savebtn' value="information"
                                                        tabindex="18">Lưu thông tin
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <hr/>
                                </div>
                            </div>
                        </form>
                        <form id="form-changePassword" action="{{route('SaveClientProfile')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="box-select">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="old_pass" class="white-label text-mul">Mật khẩu cũ<span
                                                    class="text-required">*</span></label>
                                        <input type="password" name="old_pass" id="old_pass"
                                               class="required mb-5" maxlength="50" tabindex="22"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="new_pass" class="white-label text-mul">Mật khẩu mới <span
                                                    class="text-required">*</span></label>
                                        <input type="password" name="new_pass" id="new_pass" class="required mb-5"
                                               maxlength="50" tabindex="23"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="ConfirmPassword" class="white-label text-mul">Xác nhận lại mật khẩu
                                            <span class="text-required">*</span></label>
                                        <input type="password" name="confirm_pass" id="confirm_pass"
                                               class="required mb-5" maxlength="50" tabindex="24"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="newPassword" class="white-label text-mul"> </label>
                                        <button type="submit" id="btn-change" style="margin-top: 5px;" tabindex="25"
                                                name="savebtn" value="password">
                                            Thay đổi mật khẩu
                                        </button>
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
