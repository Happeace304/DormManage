<!DOCTYPE html>
<html lang="">
<head>
    <title>Ký túc xá STN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('public/Client/')}}/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
</head>
<body id="top">

<div class="wrapper row0">
    <header id="header" class="hoc clear">

        <div id="logo" class="one_quarter first">
            <h1 class="logoname clear"><a href="index.html"><i class="fas fa-building"></i> <span>Ký túc xá STN</span></a></h1>
            <p>An ninh - Trật tự - Đảm bảo</p>
        </div>
        <div class="three_quarter">
            <ul class="nospace clear">
                <li class="one_third first">
                    <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Liên hệ:</strong> +84123456789</span></div>
                </li>
                <li class="one_third">
                    <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Email:</strong> hotro@ktx.com</span></div>
                </li>
                <li class="one_third">
                    <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> T2 - T7:</strong> 08:00 - 18.00</span></div>
                </li>
            </ul>
        </div>

    </header>
</div>

<div class="wrapper row1">
    <div class="hoc clear">

        <nav id="mainav">
            <ul class="clear">
                <li class="active"><a href="index.html">Trang chủ</a></li>
                <li><a href="#">Bảng giá</a></li>
                <li><a href="#">Thông tin đang lưu trú</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
            </ul>
        </nav>

    </div>
</div>



@yield('banner')
@yield('main')


<div class="wrapper row4">
    <footer id="footer" class="hoc clear">

        <div class="one_quarter first">
            <h1 class="logoname clear"><a href="index.html"><i class="fas fa-building"></i> <span>STN</span></a></h1>
            <p class="btmspace-30">08 Hà Văn Tính, Hòa Khánh Nam, Liên Chiểu, ĐN SĐT văn phòng: (0236)3.772.579 - ANTT: (0236)3.740.080</p>

        </div>
        <div class="one_quarter">
            <h6 class="heading">Liên kết</h6>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
            </ul>
        </div>
    </footer>
</div>

</footer>
</div>

<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left"><a href="_LayoutUser.html">Ký túc xá STN</a> Email: kytucxastn@ktxdn.vn | Webmaster: admin@ktxdn.vn</p>

    </div>
</div>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{asset('public/Client/')}}/scripts/jquery.min.js"></script>
<script src="{{asset('public/Client/')}}/scripts/jquery.backtotop.js"></script>
<script src="{{asset('public/Client/')}}/scripts/jquery.mobilemenu.js"></script>
</body>
</html>