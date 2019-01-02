@extends('layouts.layoutUser')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Danh sách tin tức</h1>
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
<!--Search Area Start-->
<div class="container area-search" id="condition-search">
    <form id="form-search" action="{{route('timNews')}}" accept-charset="UTF-8" method="get">
        <div class="area-search">
            <div class="row">
                <div class="row col-md-offset-3" style="margin-top: 50px">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <input class="form-control" style="border-radius: 0px;" name="TieuDe" id="TieuDe" tabindex="1" value="" placeholder="Tiêu đề" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success" id="btn-search" link-search="#" tabindex="6">Tìm kiếm</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <hr width="40%" style="border-top:2px solid #2d3e50;" />
</div>
<!--End of Search Area-->
<!--News Details Area Start-->
<div class="news-details-area section-padding" style="padding-top:50px;" id="div-list-news">
    <div class="container">
        <div class="row" id="news-area" link-tin-tuc="#">
            <div class="row">
                @foreach($news as $item)
                    <div class="col-md-6">
                        <div class="single-latest-item">
                            <div class="single-latest-image">
                                <a href="{{route('xemNews',['slug'=>$item->slug])}}"><img src="{{ asset('public/image/news').'/'.$item->imgLink }}" style="height:235px;width:235px;" alt=""></a>
                            </div>
                            <div class="single-latest-text" style="height: 235px;">
                                <a href="{{route('xemNews',['slug'=>$item->slug])}}"><h3>{{$item->title}}</h3></a><br>
                                <div class="single-item-content" style="margin-bottom:0px;">
                                    <div class="single-item-comment-view">
                                        <span><i class="zmdi zmdi-calendar-check"></i>{{\Illuminate\Support\Carbon::parse($item->created_at)->format('d-m-Y')}}</span>
                                    </div>
                                </div>
                                <div class="content-tintuc">
                                    @if(strlen($item->content) >80) {{strip_tags(str_limit($item->content, 80))}}@else {{strip_tags($item->content)}} @endif
                                </div>
                                <a href="{{route('xemNews',['slug'=>$item->slug])}}" class="button-default">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination-content">
                               {{$news->links()}}
                            </div>
                        </div>
                    </div>
            </div>
            <input type="hidden" id="NumberOfRecord" name="NumberOfRecord" value="@tinTucs.Paging.NumberOfRecord" />
            <input type="hidden" id="TotalPages" name="TotalPages" value="@tinTucs.Paging.TotalPages" />
    </div>
</div>
</div>
<!--End of News Details Area-->
@endsection
