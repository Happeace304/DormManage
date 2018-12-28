<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/favicon.ico') }}">

    <title>KTX TSN</title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/assets/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('public/assets/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('public/css/custom.min.css') }}" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-building"></i> <span>KTX STN</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img @if(Auth::user()->imgLink == null) src="{{ asset('public/image/user.png') }}"
                             @else src="{{asset('public/image').'/'.Auth::user()->imgLink}}"
                             @endif
                             alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Xin chào</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Quản lý tin tức <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('DanhSachTinTuc') }}">Danh sách tin tức</a></li>
                                    <li><a href="{{route('ThemTinTuc') }}">Thêm tin tức</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Quản lý sinh viên <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('DanhSachSinhVien') }}">Danh sách sinh viên</a></li>
                                    <li><a href="{{route('ThemSinhVien') }}">Thêm sinh viên</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Quản lý phòng <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('DanhSachPhong') }}">Danh sách phòng</a></li>
                                </ul>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                            <li><a><i class="fa fa-table"></i> Quản lý nhân viên <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('DanhSachNhanVien') }}">Danh sách nhân viên</a></li>
                                    <li><a href="{{route('ThemNhanVien') }}">Thêm nhân viên</a></li>
                                </ul>
                            </li>
                                @endif
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img @if(Auth::user()->imgLink == null) src="{{ asset('public/image/user.png') }}"
                                     @else src="{{asset('public/image').'/'.Auth::user()->imgLink}}"
                                     @endif
                                        alt="">{{ Auth::user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{route('Profile')}}"> Trang cá nhân</a></li>

                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Ký túc xá TSN by <a href="https://colorlib.com">Trâm_Sơn_Nhật</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- Xoa Nhieu-->
<script src="{{ asset('public/js/xoaNhieu.js')}}"></script>
<!-- jQuery -->
<script src="{{ asset('public/assets/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/assets/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('public/assets/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('public/assets/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{ asset('public/assets/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{ asset('public/assets/google-code-prettify/src/prettify.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('public/js/custom.min.js')}}"></script>

</body>
</html>
