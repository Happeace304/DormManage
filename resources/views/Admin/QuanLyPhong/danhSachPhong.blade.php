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
                    <form class="form-horizontal input_mask" id="form-search" action="{{route('Phong.Search')}}" accept-charset="UTF-8" method="get">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="TenPhong">Tên phòng</label>
                                    <input class="form-control" name="Phong" id="Phong" tabindex="1"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="TinhTrang">Tình trạng phòng</label>
                                    <select class="form-control" name="TinhTrang" id="TinhTrang" tabindex="2">
                                        <option value="">Tất cả</option>
                                        <option value="true">Đầy</option>
                                        <option value="false">Trống</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary" id="btn-search" link-search="#" tabindex="3">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách phòng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link" tabindex="4"><i class="fa fa-chevron-up"></i></a>
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

                                    <th class="text-center">Xem chi tiết</th>
                                    <th class="text-center">Tên phòng</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tiền điện</th>
                                    <th class="text-center">Tình trạng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($room as $item)
                                    <tr>

                                        <td class="text-center middle">
                                            <a href="{{route('XemChiTietPhong',['id'=>$item->roomId])}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->roomName}}
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->peopleCount}}
                                        </td>
                                        <td class="text-center middle ">
                                            {{$item->total}} VNĐ
                                        </td>
                                        <td class="text-center middle">
                                            {{$item->peopleCount <4? 'Trống':'Đầy'}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-xs-3 pl-0">

                        </div>
                        <div class="col-xs-9 pr-0">
                            <div  style="float:right;">
                                {{ $room->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
