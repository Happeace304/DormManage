@extends('layouts.layoutUser')
@section('content')
<!--Slider Area Start-->
<!--Cái này cho vòng for, lấy ra 2 tin tức mà ngày tạo sớm nhất, lưu ý id ="slider-1-caption1" phải khác nhau, class cũng vậy, có mấy
 cái như slider-1 thì mình có thể +id sau nó cũng đc-->

<div class="slider-area">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            <img src="{{ asset('public/image/news/1.jpg') }}" alt="" title="#slider-1-caption1"/>
            <img src="{{ asset('public/image/news/3.jpg') }}" alt="" title="#slider-1-caption2"/>
        </div>
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content">
                                    <h1 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s">Ngày hội hiến máu<br> nhân đạo<br> tại Ký túc xá </h1>
                                    <p class="sub-title wow fadeInUp hidden-xs" data-wow-duration="2900ms" data-wow-delay=".5s"> “Một giọt máu đào, gởi trao hi vọng” đó là tinh thần,<br> là ý nghĩa nhân văn mà mỗi năm 2 lần tại 2 khu KTX sinh viên.....</p>
                                    <div class="banner-readmore wow fadeInUp" data-wow-duration="3600ms" data-wow-delay=".6s">
                                        <a class="button-default" href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content slide-2">
                                    <h1 class="title1 wow rotateInDownLeft" data-wow-duration="1000ms" data-wow-delay="0s">Tiêu đề</h1>
                                    <p class="sub-title wow rotateInDownLeft hidden-xs" data-wow-duration="1800ms" data-wow-delay="0s"> Nội dung</p>
                                    <div class="banner-readmore wow rotateInDownLeft" data-wow-duration="1800ms" data-wow-delay="0s">
                                        <a class="button-default" href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Slider Area-->
<!--About Area Start-->
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-container">
                    <h3>Đôi nét về ký túc xá</h3>
                    <p style="color: #0f0f0f; font-size: 16px;">
                        Địa chỉ: Đường Doãn Uẩn, phường Khuê Mỹ, quận Ngũ Hành Sơn, TP. Đà Nẵng (cách Đại học Kiến trúc Đà Nẵng ~ 2.5Km, cách Đại học Kinh tế Đà Nẵng ~ 1.7Km )
                    <br>
                        Diện tích: 11.964m2
                    <br>
                        -   Gồm 03 tòa nhà, có sức chứa gần 2.500 sinh viên
                    <br>
                        -   Gồm 03 tòa nhà: A, B, C (A, B: 5 tầng, C: 9 tầng)
                    <br>
                        -   Khu vực bố trí sinh viên nam: Khu A, tầng 4, 5 Khu B<br>
                        Khu vực bố trí sinh viên nữ: Khu C, tầng 1, 2, 3 Khu B
                    <br>
                        Khu vực dịch vụ & văn phòng Ký túc xá: Tầng 01, 02 khu C
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<!--Latest News Area Start-->
<div class="latest-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper" style="margin-bottom: 80px; margin-top: 20px;">
                    <div class="section-title">
                        <h3>Tin tức</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="single-latest-item">
                    <div class="single-latest-image">
                        <a href="#"><img src="{{ asset('public/image/news/1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single-latest-text">
                        <h3><a href="#">Tiêu đề</a></h3>
                        <div class="single-item-comment-view">
                            <span><i class="zmdi zmdi-calendar-check"></i>Ngày tạo</span>
                        </div>
                        <p>Nội dung</p>
                        <a href="#" class="button-default">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-latest-item">
                    <div class="single-latest-image">
                        <a href="#"><img src="{{ asset('public/image/news/1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single-latest-text">
                        <h3><a href="#">Tiêu đề</a></h3>
                        <div class="single-item-comment-view">
                            <span><i class="zmdi zmdi-calendar-check"></i>Ngày tạo</span>
                        </div>
                        <p>Nội dung</p>
                        <a href="#" class="button-default">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-latest-item">
                    <div class="single-latest-image">
                        <a href="#"><img src="{{ asset('public/image/news/1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single-latest-text">
                        <h3><a href="#">Tiêu đề</a></h3>
                        <div class="single-item-comment-view">
                            <span><i class="zmdi zmdi-calendar-check"></i>Ngày tạo</span>
                        </div>
                        <p>Nội dung</p>
                        <a href="#" class="button-default">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-latest-item">
                    <div class="single-latest-image">
                        <a href="#"><img src="{{ asset('public/image/news/1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single-latest-text">
                        <h3><a href="#">Tiêu đề</a></h3>
                        <div class="single-item-comment-view">
                            <span><i class="zmdi zmdi-calendar-check"></i>Ngày tạo</span>
                        </div>
                        <p>Nội dung</p>
                        <a href="#" class="button-default">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 text-center">
                <a href="#" class="button-default button-large">Tất cả tin tức<i class="zmdi zmdi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!--End of Latest News Area-->
@endsection
