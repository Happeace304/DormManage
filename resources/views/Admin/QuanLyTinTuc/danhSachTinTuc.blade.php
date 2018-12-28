@extends('layouts.layoutAdmin')
@section('content')
    <div class="row">
        <!-- start of weather widget -->
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Điều kiện tìm kiếm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="condition-search">
                    <form class="form-horizontal input_mask" id="form-search" action="{{route('TinTuc.Search')}}" accept-charset="UTF-8" method="get">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="TieuDe">Tiêu đề</label>
                                    <input class="form-control" name="TieuDe" id="TieuDe" tabindex="1"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary" id="btn-search" link-search="#" tabindex="2">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách tin tức</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link" tabindex="3"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="div-table-course">
                    <div class=" table-result" id="table-result" link-del="#" link-update-show="#" link-update-state="#">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered jambo_table">
                                <thead>
                                <tr>
                                    <th class="text-center col-checkbox">
                                        <input type="checkbox" id="check-all" class="flat" onclick="checkAll();">
                                    </th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Người viết</th>
                                    <th class="text-center">Ngày viết</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <td class="text-center middle col-checkbox">
                                            <input type="checkbox" class="flat check-item" name="check-remove" id="{{$item->newsId}}">
                                        </td>
                                        <td class="text-center middle">
                                            <a href="{{route('EditFormTinTuc',['id'=>$item->newsId])}}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="text-center middle">
                                            {{str_limit($item->title,20)}}
                                        </td>
                                        <td class="text-center middle">
                                            {!! str_limit($item->content, 50) !!}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->user}}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->created_at}}
                                        </td>
                                        <td class="text-center middle">
                                            <form method="post" action="{{route('XoaTinTuc',['id'=> $item->newsId])}}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-xs btn-danger btn-delete" >
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-xs-3 pl-0">
                            <button type="button" class="btn btn-danger btn-delete-selected" onclick="deleteSelected();">Xóa các mục đã chọn</button>
                        </div>
                        <div class="col-xs-9 pr-0">
                            <div  style="float:right;">
                                {{ $news->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" id="massdel" action="{{route('MassDelTinTuc')}}">
            @csrf
            @method('delete')
            <input type="text" name="array" id="array" hidden>
        </form>
    </div>
@endsection
