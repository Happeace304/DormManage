@extends('layouts.layoutUser')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Liên hệ</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{url('/')}}">Trang chủ</a></li>
                                <li><a href="{{url('LienHe')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--Liên hệ Area Start-->
    <div class="course-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="course-details-content">
                        <div class="course-duration">
                            <div class="duration-title">
                                <div class="text"><span>Liên hệ với chúng tôi</span> </div>
                            </div>
                            <div class="duration-text">
                                <div class="text"><span style="text-align: left">Điện thoại </span> <span class="text-right">0961213356</span></div>
                                <div class="text"><span style="text-align: left">Email</span> <span class="text-right">ktx@gmail.com</span></div>
                                <div class="text" style="padding-bottom: 23px;"><span style="text-align: left">Địa chỉ</span> <span class="text-right" style="text-align: left;">08 Hà Văn Tính, Hòa Khánh Nam, Liêu Chiểu, Đà Nẵng</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget">
                            <div class="single-item">
                                <div class="single-item-image overlay-effect">
                                    <a href="#"><img alt="" src="{{ asset('public/image/01.jpg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Liên hệ Area-->
@endsection
