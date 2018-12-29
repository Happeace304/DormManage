@extends('layouts.layoutUser')
@section('content')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Tin tức</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Tin tức</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--News Details Area Start-->
    <div class="news-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class=" @a area-comments">
                    <div class="news-details-content">
                        <input class="hidden" id="idTinTuc" value="@data.Id" />
                        <div class="single-latest-item">
                            <img src="{{ asset('public/image/news/1.jpg') }}" alt="" style="width:100%;">
                            <div class="single-latest-text">
                                <h3>Ngày hội hiến máu nhân đạo tại Ký túc xá </h3>
                                <div class="single-item-content" style="margin-bottom:0px;">
                                    <div class="single-item-comment-view">
                                        <span><i class="zmdi zmdi-calendar-check"></i>20/12/2018</span>
                                </div>
                                <div>
                                    “Một giọt máu đào, gởi trao hi vọng” đó là tinh thần, là ý nghĩa nhân văn mà mỗi năm 2 lần tại 2 khu KTX sinh viên Thành phố Đà Nẵng luôn tổ chức đều đặn cho các bạn sinh viên tại 2 khu KTX tham gia.
<br>
                                    Thông qua chương trình mỗi năm huy động một lượng máu đáng kể góp phần giúp đỡ bệnh nhân nghèo giảm bớt gánh lo viện phí đồng thời qua đó hướng các bạn sinh viên biết sống vì cộng đồng, biết góp nhặt yêu thương để chia sẽ với xã hội.
<br>
                                    Hằng năm, Ban lãnh đạo KTX phối hợp với Hội chữ thập đỏ Thành Phố Đà Nẵng, Ban vận động Hiến máu quận Liên Chiểu tổ chức chương trình hiến máu thường niên, tiếp tục thu hút đông đảo sinh viên, cán bộ của 2 khu KTX tham gia.
                               <br>
                                    Biết được tầm quan trọng và ý nghĩa to lớn của việc làm này nên các bạn sinh viên cũng như cán bộ KTX đã tham gia rất đông, nụ cười rạng rỡ trên khuôn mặt mỗi người khi nhìn thấy dòng máu nóng của mình đang chảy ra, mang hơi ấm đến cộng đồng, xua tan bớt lo âu mệt mỏi cho những người bệnh đang ngày đêm vật lộn với sự sống. Ở đâu đó các bạn sẽ cảm nhận được những giọt máu của mình đang mang sự sống đến cho người khác, niềm tự hào khi biết dòng máu của mình đang chảy trên cơ thể một ai đó, giúp họ tiếp tục cuộc sống này, giúp họ có thêm những ngày tươi đẹp bên gia đình, được viết tiếp ước mơ còn giang dỡ, được thực hiện những hoài bảo tưởng chừng như đóng lại sau cánh cổng bệnh viện.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" @b" style="margin-bottom: 20px;">
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget">
                            <h4 class="title">Xem các tin tức tiếp theo</h4>
                            <div class="recent-content">
                                {{--@foreach (TinTuc tintuc in data.ListReccentNew)--}}
                                    {{--{--}}
                                    @for( $i=0;$i<2;$i++)
                                    <div class="recent-content-item">
                                        <a href="@tintuc.BeautyId"><img src="{{ asset('public/image/news/1.jpg') }}" alt="" style="width:100px;height:100px;"></a>
                                        <div class="recent-text">
                                            <h4><a href="@tintuc.BeautyId">Tiêu đề</a></h4>
                                            <div class="single-item-content" style="margin-bottom:0px;">
                                                <div class="single-item-comment-view">
                                                    <span><i class="zmdi zmdi-calendar-check"></i>Ngày đăng </span>
                                                </div>
                                            </div>
                                            Tóm tắt
                                        </div>
                                    </div>
                                @endfor
                                    {{--}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End of News Details Area-->
@endsection
