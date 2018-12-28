@extends('Client.Layout')
@section('banner')
    <div class="wrapper bgded overlay" style="background-image:url({{asset('1.jpg')}});">
        <div id="pageintro" class="hoc clear">

            <article>
                <h3 class="heading">Giới thiệu</h3>
                <footer>
                    <h6>Đôi nét về ký túc xá.....</h6>
                </footer>
            </article>

        </div>
    </div>
    @stop
@section('main')
    <div class="wrapper row3">
        <main class="hoc container clear">

            <article class="group">
                <div class="one_half first">
                    <h6 class="heading underline font-x2">Ký túc xá STN</h6>
                    <p class="btmspace-30">
                    <ul>
                        <li>Địa chỉ: Đường Doãn Uẩn, phường Khuê Mỹ, quận Ngũ Hành Sơn, TP. Đà Nẵng (cách Đại học Kiến trúc Đà Nẵng ~ 2.5Km, cách Đại học Kinh tế Đà Nẵng ~ 1.7Km )</li>
                        <li>Diện tích: 11.964m2</li>
                        <li>Gồm 03 tòa nhà, có sức chứa gần 2.500 sinh viên</li>
                        <li>Gồm 03 tòa nhà: A, B, C (A, B: 5 tầng, C: 9 tầng)</li>
                        <li>Khu vực bố trí sinh viên nam: Khu A, tầng 4, 5 Khu B<br>
                            Khu vực bố trí sinh viên nữ: Khu C, tầng 1, 2, 3 Khu B</li>
                        <li>Khu vực dịch vụ & văn phòng Ký túc xá: Tầng 01, 02 khu C</li>
                    </ul>
                    </p>
                </div>
                <div class="one_half"><a class="imgover" href="#"><img class="borderedbox inspace-10" src="{{asset('public/Client/')}}/img/backgrounds/ktxGioiThieu.jpg" alt=""></a></div>
            </article>

            <div class="clear"></div>
        </main>
    </div>
    @stop
