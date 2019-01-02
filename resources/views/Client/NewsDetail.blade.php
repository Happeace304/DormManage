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
                                <li><a href="{{route('client')}}">Trang chủ</a></li>
                                <li><a href="{{route('ListNews')}}">Tin tức</a></li>
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
                            <img src="{{ asset('public/image/news').'/'.$news->imgLink }}" alt="" style="width:100%;">
                            <div class="single-latest-text">
                                <h3>{{$news->title}}</h3>
                                <div class="single-item-content" style="margin-bottom:0px;">
                                    <div class="single-item-comment-view">
                                        <span><i class="zmdi zmdi-calendar-check"></i>{{\Illuminate\Support\Carbon::parse($news->created_at)->format('d-m-Y H:m:s')}}</span>
                                </div>
                              <div>
                                                {!! $news->content !!}
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

                                    @foreach($relate as $item)
                                    <div class="recent-content-item">
                                        <a href="{{route('xemNews',['slug'=>$item->slug])}}"><img src="{{ asset('public/image/news').'/'.$item->imgLink }}" alt="" style="width:100px;height:100px;"></a>
                                        <div class="recent-text">
                                            <h4><a href="{{route('xemNews',['slug'=>$item->slug])}}">{{$item->title}}</a></h4>
                                            <div class="single-item-content" style="margin-bottom:0px;">
                                                <div class="single-item-comment-view">
                                                    <span><i class="zmdi zmdi-calendar-check"></i>{{\Illuminate\Support\Carbon::parse($item->created_at)->format('d-m-Y')}} </span>
                                                </div>
                                            </div>
                                            @if(strlen($item->content) >80) {{strip_tags(str_limit($item->content, 80))}}@else {{strip_tags($item->content)}} @endif
                                        </div>
                                    </div>
                                @endforeach

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
