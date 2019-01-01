<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ký túc xá TSN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/favicon.ico') }}">

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Fontawsome CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}">

    <!-- Owl Carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.css') }}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">

    <!-- Meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/meanmenu.min.css') }}">

    <!-- Animate CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">

    <!-- Nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/lib/nivo-slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/lib/nivo-slider/css/preview.css') }}" type="text/css" media="screen" />

    <!-- Metarial Iconic Font CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/material-design-iconic-font.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/material-design-iconic-font.min.css') }}">

    <!-- Slick CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slick.css') }}">

    <!-- Style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/montserrat/css/style.css') }}">

    <!-- Responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('public/assets/montserrat/css/material-design-iconic-font.css') }}">


    <!-- Modernizr JS
    ============================================ -->
    <script src="{{ asset('public/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>

<!--Header Area Start-->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
                    <span>Bạn có thắc mắc? 0961213356</span>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="header-top-right">
                        @guest
                        <div class="content"><a href="{{route('login')}}"> Đăng nhập</a>
                        </div>
                        @else
                        <div class="content"><a @if(\Illuminate\Support\Facades\Auth::user()->role <=1)href="{{route('Admin.home')}}" @endif><i class="fa fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                           @if(\Illuminate\Support\Facades\Auth::user()->role ==2)
                            <ul class="account-dropdown">
                                <li><a href="{{url('profile')}}">Trang cá nhân</a></li>
                                <li><a href="{{url('logout')}}">Đăng xuất</a></li>
                            </ul>
                               @endif
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-logo-menu sticker">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="#"><img src="{{ asset('public/image/logo.png') }}"alt="KTX STN"></a>
                    </div>
                </div>
                <div class="col-md-9 hidden-sm hidden-xs">
                    <div class="mainmenu-area">
                        <div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <li class="current"><a href="{{route('client')}}">Trang chủ</a></li>
                                    <li><a href="{{url('banggia')}}">Bảng giá</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li class="current"><a href="#">Trang chủ</a></li>
                                <li><a href="#">Bảng giá</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area end -->
</header>
<!--End of Header Area-->
@yield('content')
<!--Newsletter Area Start-->
<div class="newsletter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="newsletter-content">
                    <h2>Ký túc xá TSN</h2>
                    <h6>An ninh - Trật tự - Đảm bảo</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer Widget Area Start-->
<div class="footer-widget-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6" style="margin-top: 30px;">
                <div class="single-footer-widget">
                    <h3>Liên hệ</h3>
                    <span><i class="fa fa-phone"></i>0961213356</span>
                    <span><i class="fa fa-envelope"></i>ktx@gmail.com</span>
                    <span><i class="fa fa-globe"></i>www.ktxtsn.com</span>
                    <span><i class="fa fa-map-marker"></i>08 Hà Văn Tính, Hòa Khánh Nam, Liêu Chiểu, Đà Nẵng</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6" style="margin-top: 40px;">
                <div class="single-footer-widget">
                    <h4>THỜI GIAN TIẾP NHẬN SINH VIÊN ĐK LƯU TRÚ</h4>
                    <ul>
                        <li>Thứ Hai - Thứ Sáu: 07h30 - 11h30 ; 13h30 - 17h30</li>
                        <li>Thứ Bảy: 07h30 - 11h30</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Footer Widget Area-->
<!--Footer Area Start-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <span>Copyright &copy; KTX TSN by <a href="#">Trâm_Sơn_Nhật</a></span>
            </div>
        </div>
    </div>
</footer>
<!--End of Footer Area-->


<!-- jquery
============================================ -->
<script src="{{ asset('public/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

<!-- bootstrap JS
============================================ -->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>

<!-- nivo slider js
============================================ -->
<script src="{{ asset('public/assets/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/lib/nivo-slider/home.js') }}" type="text/javascript"></script>

<!-- meanmenu JS
============================================ -->
<script src="{{ asset('public/assets/js/jquery.meanmenu.js') }}"></script>

<!-- wow JS
============================================ -->
<script src="{{ asset('public/assets/js/wow.min.js') }}"></script>

<!-- owl.carousel JS
============================================ -->
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>

<!-- scrollUp JS
============================================ -->
<script src="{{ asset('public/assets/js/jquery.scrollUp.min.js') }}"></script>

<!-- Waypoints JS
============================================ -->
<script src="{{ asset('public/assets/js/waypoints.min.js') }}"></script>

<!-- Counterup JS
============================================ -->
<script src="{{ asset('public/assets/js/jquery.counterup.min.js') }}"></script>

<!-- Slick JS
============================================ -->
<script src="{{ asset('public/assets/js/slick.js') }}"></script>

<!-- plugins JS
============================================ -->
<script src="{{ asset('public/assets/js/plugins.js') }}"></script>

<!-- main JS
============================================ -->
<script src="{{ asset('public/assets/js/main.js') }}"></script>

<!-- Nhat's js-->
<script src="{{ asset('public/js/myCustom.js')}}"></script>
</body>
</html>
