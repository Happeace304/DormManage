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
                                <h3>Tiêu đề</h3>
                                <div class="single-item-content" style="margin-bottom:0px;">
                                    <div class="single-item-comment-view">
                                        <span><i class="zmdi zmdi-calendar-check"></i>Ngày đăng</span>
                                </div>
                                <div>
                                    Nội dung
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
