@extends('layouts.layoutUser')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Bảng giá lưu trú</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Bảng giá lưu trú</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--Bảng giá Area Start-->
    <div class="course-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="course-details-content">
                        <div class="course-duration">
                            <div class="duration-title">
                                <div class="text"><span>PHÍ NỘP BAN ĐẦU</span> </div>
                            </div>
                            <div class="duration-text">
                                <div class="text"><span style="text-align: left">Phí bảo đảm tài sản</span> <span class="text-right">100.000đ/người</span></div>
                                <div class="text"><span style="text-align: left">Phí làm thẻ từ lưu trú</span> <span class="text-right">40.000đ/cái</span></div>
                                <div class="text"><span style="text-align: left">Phí hồ sơ</span> <span class="text-right">	10.000đ/bộ</span></div>
                                <div class="text"><span style="text-align: left">Phí ĐK tạm trú</span> <span class="text-right">10.000đ/người</span></div>
                                <div class="text"><span style="text-align: left">Phí giấy decal dán cửa</span> <span class="text-right">10.000đ/người</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="course-details-content" style="margin-top: 25px;">
                        <div class="course-duration">
                            <div class="duration-title">
                                <div class="text"><span>PHÍ LƯU TRÚ</span> </div>
                            </div>
                            <div class="duration-text">
                                <div class="text"><span style="text-align: left">Phí lưu trú phòng </span> <span class="text-right">85.000đ/người/tháng</span></div>
                                <div class="text"><span style="text-align: left">Phí tiền nước</span> <span class="text-right">25.000đ/người/tháng</span></div>
                                <div class="text"><span style="text-align: left">Tiền điện</span> <span class="text-right">Tính theo chỉ số sử dụng và theo đơn giá quy định</span></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget">
                            <div class="single-item">
                                <div class="single-item-image overlay-effect">
                                    <a href="#"><img alt="" src="{{ asset('public/image/BangGia/1.jpg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget">
                            <div class="single-item">
                                <div class="single-item-image overlay-effect">
                                    <a href="#"><img alt="" src="{{ asset('public/image/BangGia/2.jpg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Bảng giá Area-->
@endsection
