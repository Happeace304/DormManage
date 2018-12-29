@extends('layouts.layoutUser')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center no-line">Đăng nhập</h1>
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
                <div class="col-md-6 col-md-offset-3">
                    <form id="form-login" action="#" method="post">
                    <div class="form-container">
                        <div class="box-select">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" name="email" id="email" class="required" maxlength="50" tabindex="1" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="password" name="password" id="password" class="required" maxlength="50" tabindex="2" placeholder="Mật khẩu" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label class="custom-check">
                                        <span class="text-login">Nhớ đăng nhập</span>
                                        <input type="checkbox" id="Remember" value="1" tabindex="3">
                                        <span class="checkmark"><span class="check"></span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" id="btn-login" tabindex="4">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End of Search Category-->
@endsection
