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
<!--Search Area Start-->
<div class="container area-search" id="condition-search">
    <form id="form-search" action="" accept-charset="UTF-8" method="get">
        <div class="area-search">
            <div class="row">
                <div class="row col-md-offset-3" style="margin-top: 50px">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <input class="form-control" style="border-radius: 0px;" name="TieuDe" id="TieuDe" tabindex="1" value="" placeholder="Tiêu đề" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" id="btn-search" link-search="#" tabindex="6">Tìm kiếm</button>
                    </div>
                    <input type="hidden" name="CurrentPage" id="CurrentPage" value="@data.Paging.CurrentPage" />
                    <input type="hidden" name="PageSize" id="PageSize" value="@data.Condition.PageSize" />
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
                {{--@foreach (TinTuc tintuc in listTinTuc)--}}
                    {{--{--}}
                {{--@for( $i=0;$i<9;$i++)--}}
                    <div class="col-md-6">
                        <div class="single-latest-item">
                            <div class="single-latest-image">
                                <a href="#"><img src="{{ asset('public/image/news/1.jpg') }}" style="height:235px;width:235px;" alt=""></a>
                            </div>
                            <div class="single-latest-text" style="height: 235px;">
                                <a href="#"><h3>Ngày hội hiến máu nhân đạo tại Ký túc xá</h3></a><br>
                                <div class="single-item-content" style="margin-bottom:0px;">
                                    <div class="single-item-comment-view">
                                        <span><i class="zmdi zmdi-calendar-check"></i>20/12/2018</span>
                                    </div>
                                </div>
                                <div class="content-tintuc">
                                    “Một giọt máu đào, gởi trao hi vọng” đó là tinh thần, là ý nghĩa nhân văn...
                                </div>
                                <a href="#" class="button-default">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="single-latest-item">
                        <div class="single-latest-image">
                            <a href="#"><img src="{{ asset('public/image/news/4.jpg') }}" style="height:235px;width:235px;" alt=""></a>
                        </div>
                        <div class="single-latest-text" style="height: 235px;">
                            <a href="#"><h3>Hội thi tiếng hát Karaoke “Chào mừng ngày nhà giáo Việt Nam 20/11”</h3></a>
                            <div class="single-item-content" style="margin-bottom:0px;">
                                <div class="single-item-comment-view">
                                    <span><i class="zmdi zmdi-calendar-check"></i>20/11/2018</span>
                                </div>
                            </div>
                            <div class="content-tintuc">
                                Cứ mỗi mùa hiến chương đến là lời bài hát này lại vang lên như một nốt trầm đẹp đẽ giữa bao nhiêu xô bồ của cuộc sống...
                            </div>
                            <a href="#" class="button-default">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                    {{--@endfor--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination-content">
                                <ul class="pagination"></ul>
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
