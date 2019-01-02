@extends('layouts.layoutUser')
@section('content')
<!--Slider Area Start-->
<!--Cái này cho vòng for, lấy ra 2 tin tức mà ngày tạo sớm nhất, lưu ý id ="slider-1-caption1" phải khác nhau, class cũng vậy, có mấy
 cái như slider-1 thì mình có thể +id sau nó cũng đc-->

<div class="slider-area" >
    <div class="preview-2">
        {{--<div id="nivoslider" class="slides" style="height: 600px; width: 100%">--}}
        <div id="nivoslider" class="slides" style="height: 600px; width: 100%">
            @foreach($feature as $index=>$item)
                {{--<img src="{{ asset('public/image/news').'/'.$item->imgLink }}" alt="" title="#slider_{{$index}}" style="min-height: 680px; max-height: 680px; width: 100%"/>--}}
                <img src="{{ asset('public/image/news').'/'.$item->imgLink }}" alt="" title="#slider_{{$index}}"/>
            @endforeach
        </div>
        @foreach($feature as $index=>$item1)
        <div id="slider_{{$index}}" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-{{$index}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content">
                                    <h2 class="title1 wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0s">{{$item1->title}}</h2>
                                    <p class="sub-title wow fadeInUp hidden-xs" data-wow-duration="2900ms" data-wow-delay=".5s">
                                        @if(strlen($item1->content) >80) {{strip_tags(str_limit($item1->content, 80))}}@else {{strip_tags($item1->content)}} @endif</p>
                                    <div class="banner-readmore wow fadeInUp" data-wow-duration="3600ms" data-wow-delay=".6s">
                                        <a class="button-default" href="{{route('xemNews',['slug'=>$item1->slug])}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
            @foreach($news as $item2)
                <div class="col-md-6">
                    <div class="single-latest-item">
                        <div class="single-latest-image">
                            <a href="{{route('xemNews',['slug'=>$item2->slug])}}"><img src="{{ asset('public/image/news').'/'.$item2->imgLink }}" style="height:235px;width:235px;" alt=""></a>
                        </div>
                        <div class="single-latest-text" style="height: 235px;">
                            <a href="{{route('xemNews',['slug'=>$item2->slug])}}"><h3 style="min-height: 47px;">{{$item2->title}}</h3></a>
                            <div class="single-item-content" style="margin-bottom:0px;">
                                <div class="single-item-comment-view">
                                    <span><i class="zmdi zmdi-calendar-check"></i>{{$item2->created_at}}</span>
                                </div>
                            </div>
                            <div class="content-tintuc">
                                @if(strlen($item2->content) >80) {{strip_tags(str_limit($item2->content, 80))}}@else {{strip_tags($item2->content)}} @endif
                            </div>
                            <a href="{{route('xemNews',['slug'=>$item2->slug])}}" class="button-default">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 col-sm-12 text-center">
                <a href="{{route('ListNews')}}" class="button-default button-large">Tất cả tin tức</a>
            </div>
        </div>
    </div>
</div>
<!--End of Latest News Area-->
@endsection
